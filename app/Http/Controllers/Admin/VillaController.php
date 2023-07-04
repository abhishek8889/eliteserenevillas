<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Address;
use App\Models\Media;
use Auth;

class VillaController extends Controller
{
   public function index(){
      $villas = Villas::with('address','media')->get();
     
      return view('Admin.villas.index',compact('villas'));
   }
   public function addvillas(){

    return view('Admin.villas.addvillas');
   }
   public function addProcc(Request $request){
      $request->validate([
         'villaname' => 'required',
         'slug' => 'required|unique:villas',
         'street_name' => 'required',
         'city' => 'required',
         'state' => 'required',
         'country_name' => 'required',
         // 'images' => 'mimes:jpg,png,jpeg,webp',
      ]);

      $villas = new Villas;
      $villas->name = $request->villaname;
      $villas->user_id = Auth::user()->id;
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
              $name = 'villas_'.rand(0,1000).time().'.'.$extension;
              $f->move(public_path().'/villa_images/',$name);
              
              $media = new Media;
              $media->villa_id = $villas->id;
              $media->media_name = $name;
              $media->media_url = url('villa_images/'.$name);
              $media->save();
              $media_ids[] = $media->id; 
            }
         }else{
               $media = new Media;
               $media->villa_id = $villas->id;
               $media->media_name = 'default-image.jpg';
               $media->media_url = url('public/villa_images/'.'default-image.jpg');
               $media->save();
         }
         $villas_update = Villas::find($villas->id);
         $villas_update->Location_id = $address->id;
         $villas_update->banner_id = json_encode([$media['id']]);
         $villas_update->update();
         return redirect()->back()->with(['success'=>'successfully saved villas']);
      }else{
         return redirect()->back()->with(['error'=>'successfully saved villas']);
      }
   }
   public function villaView($slug){

         return view('Admin.villas.villaview');
   }
}
