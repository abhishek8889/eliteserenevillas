<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Address;
use App\Models\Media;
use App\Models\Pricing;
use App\Models\Reservation;
use App\Models\Amenities;
use Auth;
use DB;
use Illuminate\Support\Facades\File;
class VillaController extends Controller
{
   public function index(){
      $villas = Villas::with('address','media')->get();
     
      return view('Admin.villas.index',compact('villas'));
   }
   public function addvillas(){

      $amenities = Amenities::get();
      // dd($amenities);
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
         // 'images' => '',
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
         $villas = Villas::where('slug',$slug)->with('address','media')->first();
         $villas_pricing = Pricing::where('villa_id',$villas->id)->get();
      
         return view('Admin.villas.villaview',compact('villas','villas_pricing'));
   }
   public function delete($id){
      $villas = Villas::find($id);
      if($villas){
         $villas->delete();
         return redirect('admin-dashboard/villas')->with('success','Success!Villas deleted successfully');
      }else{
         return redirect()->back()->with('error','Failed to delete!something went wrong');
      }
   }
   public function update(Request $request){
      if($request->val){
      // $slug = strtolower(str_replace(" ","-",$request->val));
      $update = Villas::find($request->id);
      $update->name = $request->val;
      // $update->slug = $slug;
      $update->update();
      return response()->json('successfully updated villas name');
      }
      // Update Image code is here
      elseif($request->image_id){
         $media = Media::find($request->image_id);
         if($request->hasFile('file')){
            ///////
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $name = 'villas_'.rand(0,1000).time().'.'.$extension;
            $file->move(public_path().'/villa_images/',$name);
            $update = Media::find($request->image_id);
            $update->media_name = $name;
            $update->media_url = url('villa_images/'.$name);
            $update->update();
            return redirect()->back()->with('success','Image has been updated');
         }
      }
      // Add Feature Image Code 
      elseif($request->featuredImage){
         $Villa = Villas::where("id",$request->villaId)->update(["banner_id" => $request->featuredImage]);
         return response()->json('Fetured image has successfully updated');
         // return response()->json($request->all());
      }
      // This is address update code
      else{
        $request->validate([
         'street' => 'required',
         'city' => 'required',
         'state' => 'required',
         'country_name' => 'required',
        ]);
        $update = Address::find($request->id);
        $update->street_name = $request->street;
        $update->city = $request->city;
        $update->state = $request->state;
        $update->country = $request->country_name;
        $update->update();
        return response()->json($update);
      }
   }
   public function calendar($id){
      $events = Reservation::where('villa_id',$id)->get();
     $data = array();
      foreach($events as $event){
      $data[] =  array(
         'id'       => $event->id,
         'title'    =>  $event->title,
         'start'    =>  $event->start,
         'end'      =>  $event->end,
         'status'   =>  '1',
         'description' => $event->descirption,
         'color'    =>  '#6294a7',
         'allDay'   =>  false,
     );
   }
      return response()->json($data);

   }
   
// }
   // Remove Image function 
   public function removeImage(Request $request){
      // return  response()->json($request->all());
      $mediaImage = Media::find($request->media_id);
      $image_path = $mediaImage->media_url;
      $image_path = public_path("/villa_images/".$mediaImage->media_name); 
      if(File::exists($image_path)) {
         File::delete($image_path);
         $mediaImage = Media::find($request->media_id);
         $mediaImage->delete();
      }else{
         return response()->json(false);
      }
      return response()->json(true);
   }

   public function addImage(Request $request) {
      // return response()->json($request->all());

      if ($request->hasFile('image')) {
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $name = 'villas_' . rand(0, 1000) . time() . '.' . $extension;
          $file->move(public_path() . '/villa_images/', $name);
          $media = new Media;
          $media->villa_id = $request->villaId;
          $media->media_name = $name;
          $media->media_url = url('villa_images/' . $name);
          $media->save();
          return response()->json('Image added successfully');
      }else{
         return response()->json(false);
      }
  }
  
}
