<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\Pricing;
use App\Models\Servicelist;

class FrontVillas extends Controller
{
    public function index(){
        $villas = Villas::with('address','media','amenities','service','villafeatureimage','pricing')->get();
        $PropertyTypes = Category::all();
        $Amenities = Amenities::all();
        $Servicelists = Servicelist::all();
        // dd($villas);
        return view('Front.villas.index',compact('villas','PropertyTypes','Amenities','Servicelists'));
    }
    public function villaview($slug){
        // echo $slug;
        $villas = Villas::where('slug',$slug)->with('address','media','amenities','service.service','customedata','pricing')->first();
        // dd($villas);
        $aminties = Amenities::get();
        return view('Front.villas.villaview',compact('villas','aminties'));
    }
    public function calendar($id){
        $pricing = Pricing::where('villa_id',$id)->get();
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
}
