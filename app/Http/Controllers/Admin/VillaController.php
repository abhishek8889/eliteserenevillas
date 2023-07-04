<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Address;

class VillaController extends Controller
{
   public function index(){

      return view('Admin.villas.index');
   }
   public function addvillas(){

    return view('Admin.villas.addvillas');
   }
   public function addProcc(Request $request){
      echo '<pre>';
      print_r($request->all());
      echo '</pre>';
      $request->validate([
         'villaname' => 'required',
         'slug' => 'required',
         'street_name' => 'required',
         'city' => 'required',
         'state' => 'required',
         'country_name' => 'required',
      ]);

      $villas = new Villas;
      $villas->name = $request->villaname;
      $villas->slug = $request->slug;
      $villas->save();

      if($villas->save()){
         $address = new Address;
         $address->villa_id = $villas->id;
         $address->street_name = $request->street_name;
         $address->city = $request->city;
         $address->state = $request->state;
         $address->country = $request->country_name;
         $address->save();
         if($request->hasFile('images')){
            $file = $request->file('images');
            foreach($file as $f){
              $extension = $f->getClientOriginalExtension();
              $name = $villas->name.'_'.rand(0,1000).time().$extension;
              $file->move(public_path().'/villa_images/',$name);
              
            }
         }
      }
   
   
  
   }
   public function villaView($slug){
         
   }
}
