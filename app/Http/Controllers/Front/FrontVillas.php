<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\Pricing;
use App\Models\Servicelist;
use App\Models\Address;
use Sabre\VObject\Reader;
use League\Csv\Writer;
use App\Models\Reservation;
use App\Models\VillaIcs;
// use Illuminate\Support\Facades\Log;

class FrontVillas extends Controller
{
    public function index(){
        $villas = Villas::with('address','media','amenities','service','villafeatureimage','pricing')->get();
        $PropertyTypes = Category::all();
        $Amenities = Amenities::all();
        $Servicelists = Servicelist::all();
        $states = Address::distinct()->get('state');
        // dd($villas);
        return view('Front.villas.index',compact('villas','PropertyTypes','Amenities','Servicelists','states'));
    }
    public function villaview($slug){
        // echo $slug;
      
        $villas = Villas::where('slug',$slug)->with('address','media','amenities','service.service','customedata','pricing')->first();
        $aminties = Amenities::get();
        return view('Front.villas.villaview',compact('villas','aminties'));
    }
    public function calendar($id){
        $date = date('Y-m-d');
        $pricing = Pricing::where([['villa_id','=',$id],['date','>',$date]])->get();
        // return $pricing;
        $data = array();
        foreach($pricing as $pricing){
        $data[] =  array(
           'id'       => $pricing->id,
           'title'    =>  '$'.number_format($pricing->price,2),
           'start'    =>  $pricing->date,
           'end'      =>  $pricing->date,
           'status'   =>  '1',
           'color'    =>  'white',
           'allDay'   =>  false,
       );
     }
        return response()->json($data);
    }


    public function test(){
        // $url = 'https://www.airbnb.com/calendar/ical/53876125.ics?s=1118611b4d5c8c40b7182cd5746cb560'; 

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $url);

        // $headers = array(
        //     'Authorization: BT',
        //     'Accept: application/json'
        // );

        // curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // $response = curl_exec($curl);

        // echo $response;
     
        // $url = 'https://eliteserenevillas.com/public/icsfiles/listing_1688995289474.ics'; 

        // // $json = file_get_contents($url);

        // $icalendar = Reader::read(file_get_contents($url));
        // $events = $icalendar->getComponents('VEVENT');

        // // echo "<pre>";
        // // print_r($events);
        // $event_arr = array();
        // foreach($events as $k){
        //     echo 'name ' . $event_arr['name'] = $k->name . '<br>';
        //     echo 'start ' .$event_arr['start'] = $k->DTSTART . '<br>';
        //     echo 'end ' .$event_arr['end'] = $k->DTEND . '<br>';
        //     echo 'uid ' .$event_arr['uid'] = $k->UID . '<br>';
        //     echo 'description ' .$event_arr['description'] = $k->DESCRIPTION . '<br>';
        //     echo 'summary ' .$event_arr['summary'] = $k->SUMMARY . '<br>';
        //     echo '<hr>';
        // }
        // $message = "hello for update ics front test ";
        // Log::info($message);
          
    }
}
