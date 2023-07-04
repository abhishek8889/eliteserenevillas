<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VillaController extends Controller
{
   public function index(){

      return view('Admin.villas.index');
   }
   public function addvillas(){

    return view('Admin.villas.addvillas');
   }
   public function addProcc(Request $request){
    $file = $request->file('images');
    foreach($file as $f){
      $extension = $f->getClientOriginalExtension();
      $name = 'image_'.rand(0,1000).time().$extension;
      print_r($name.'<br>');
      
    }
   }
   public function villaView($slug){
         
   }
}
