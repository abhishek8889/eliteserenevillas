<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Sabre\VObject\Reader;
use League\Csv\Writer;
use Storage;


class AdminDashController extends Controller
{
    public function index(){
       
    return view('Admin.dashboard');
      }

    public function import(){


      return view('Admin.importpage');
    }
    public function importproc(Request $request){
      // print_r($request->all());
      $request->validate([
        'file' => 'required|mimes:ics',
      ]);
      if($request->hasFile('file')){
         $name = time().rand(1,1000);
      }
        // $file_path = public_path("icsfiles/listing-53876125.ics");
        // $icalendar = Reader::read(file_get_contents($file_path));
        // $events = $icalendar->getComponents('VEVENT');
        // $count = 0;
        // foreach($events as $ev){
        //     $summary = $ev->SUMMARY;
        //     $startDate = $ev->DTSTART;
        //     $endDate = $ev->DTEND;
        //     $description = $ev->DESCRIPTION;
        //     $uid = $ev->UID;

        //     // Do something with the extracted data
        //     echo '<pre>';
        //     echo "Event: $summary\n";
        //     echo "Start Date: $startDate\n";
        //     echo "End Date: $endDate\n";
        //     echo "description: $description\n";
        //     echo "UID: $uid\n";
        //     echo '</pre>';  
            
        //   }   
    }
    public function export(){
      $file_path = public_path("icsfiles/listing-53876125.ics");
      $data[0]  = "BEGIN:VCALENDAR";
      $data[1] = "PRODID:-//Google Inc//Google Calendar 70.9054//EN";
      $data[2] = "VERSION:2.0";
      $data[3] = "CALSCALE:GREGORIAN";
      $data[4] = "METHOD:REQUEST";
      $data[8] = "BEGIN:VEVENT";
      $data[9] = "DTSTART:20230712T081111Z";
      $data[10] = "DTEND:20230612T101111Z";
      $data[11] = "DTSTAMP:20140312T072230Z";
      $data[12] = "UID:aj5nufn03q772ukb54u1pp6c88@example.com";
      $data[13] = "CREATED:20140312T072126Z";
      $data[14] = "DESCRIPTION:Hair cut\, 2\,5h\, 300Eur";
      $data[15] = "LAST-MODIFIED:20140312T072206Z";
      $data[16] = "LOCATION:";
      $data[17] = "SEQUENCE:0";
      $data[18] = "STATUS:CONFIRMED";
      $data[19] = "SUMMARY:Matu griešana";
      $data[20] = "TRANSP:OPAQUE";
      $data[21] = "END:VEVENT";
      $data[22] = "END:VCALENDAR";

     $data_ = implode("\r\n", $data);
     file_put_contents($file_path, "\xEF\xBB\xBF".  $data_);
     return response()->download(public_path('icsfiles/listing-53876125.ics'));
    }
    }

