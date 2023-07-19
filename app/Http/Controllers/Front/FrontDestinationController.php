<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontDestinationController extends Controller
{
    //
    public function index(){
        return view('Front/destinations/destination_list');
    }
    public function details(Request $request){
        return view('Front/destinations/destinationDetail');
    }
}
