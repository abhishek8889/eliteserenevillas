<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Amenities;

class FrontVillas extends Controller
{
    public function index(){
        $villas = Villas::with('address','media','amenities','service','villafeatureimage')->get();
        // dd($villas);
        return view('Front.villas.index',compact('villas'));
    }
    public function villaview($slug){
        // echo $slug;
        $villas = Villas::where('slug',$slug)->with('address','media','amenities','service.service')->first();
        // dd($villas);
        $aminties = Amenities::get();
        return view('Front.villas.villaview',compact('villas','aminties'));
    }
}
