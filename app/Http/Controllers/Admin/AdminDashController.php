<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Sabre\VObject\Reader;
use League\Csv\Writer;
use Storage;
use App\Models\Reservation;
use Auth;
use DateTime;


class AdminDashController extends Controller
{
    public function index(){
       
    return view('Admin.dashboard.dashboard');
      }

    public function import(){

      return view('Admin.dashboard.importpage');
    }
    public function importproc(Request $request){
      // print_r($request->all());
      // $request->validate([
      //   'file' => 'required|mimes:text/calendar',
      // ]);
      if($request->hasFile('file')){
        $file = $request->file('file');
        if($file->getClientOriginalExtension() !== 'ics'){
          return redirect()->back()->with(['error'=>'Only ics file supported']);
        }
         $name = 'listing_'.time().rand(1,1000).'.'.$file->getClientOriginalExtension();
         $file->move(public_path().'/icsfiles',$name);
      }
        $file_path = public_path("icsfiles/$name");
        $icalendar = Reader::read(file_get_contents($file_path));
        $events = $icalendar->getComponents('VEVENT');
        $count = 0;
        foreach($events as $ev){
            $summary = $ev->SUMMARY;
            $startDate = date('Y-m-d', strtotime($ev->DTSTART));
            $endDate = date('Y-m-d', strtotime($ev->DTEND));
            $description = str_replace("\n"," ",$ev->DESCRIPTION);
            $uid = $ev->UID;
            $event = new Reservation;
            $event->title = $summary;
            $event->start = $startDate;
            $event->end = $endDate;
            $event->descirption = $description;
            $event->uid = $uid;
            $event->villa_id = $request->villa_id;
            $event->save();
          }   
          return redirect()->back()->with('success','successfully imported data');
    }
    public function export($id){
      $file_name = 'listing-53876125.ics';
      $file_path = public_path("icsfiles/listing-53876125.ics");
      $events = Reservation::where('villa_id',$id)->get();
      $new_data_ics = [];
      $new_data_ics[0]  = "BEGIN:VCALENDAR";
      $new_data_ics[1] = "PRODID;X-RICAL-TZSOURCE=TZINFO:-//Airbnb Inc//Hosting Calendar 0.8.8//EN";
      $new_data_ics[2] = "VERSION:2.0";
      $new_data_ics[3] = "CALSCALE:GREGORIAN";
      $new_data_ics[4] = "METHOD:REQUEST";
      foreach($events as $ev){
        $start = new DateTime($ev->start);
        $end = new DateTime($ev->end);
        $start_date =  $start->format('Ymd');
        $end_date =  $end->format('Ymd');
        $new_data_ics[] = "BEGIN:VEVENT";
        $new_data_ics[] = "DTSTART;VALUE=DATE:$start_date";
        $new_data_ics[] = "DTEND;VALUE=DATE:$end_date";
        $new_data_ics[] = "UID:$ev->uid";
        if($ev->descirption == null || $ev->descirption == ""){

        }else{
          $new_data_ics[] = "DESCRIPTION:$ev->descirption";
        }
        $new_data_ics[] = "SUMMARY:$ev->title";
        $new_data_ics[] = "END:VEVENT";
      }
      $new_data_ics[] = "END:VCALENDAR";
    

     $new_data_ics = implode("\r\n", $new_data_ics);
     header("text/calendar");
     file_put_contents($file_path, "\xEF\xBB\xBF".  $new_data_ics);
     return response()->download(public_path('icsfiles/listing-53876125.ics'));
    }
    }

