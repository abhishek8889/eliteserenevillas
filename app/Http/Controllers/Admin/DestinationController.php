<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function index($slug = null){
        if($slug){
            $destination = Destination::where('slug',$slug)->first();
        }else{
            $destination = null;
        }
        
        return view('Admin.destinations.index',compact('destination'));
    }
    public function addDestinations(Request $request){
        if($request->id == null){
        $request->validate([
            'heading' => 'required|unique:destinations',
            'sub_heading' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $destination = new Destination;
        $destination->heading = $request->heading;
        $destination->slug = strtolower(str_replace(" ","-",$request->heading));
        $destination->subheading = $request->sub_heading;
        $destination->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().rand(0,100).str_replace(" ","",$request->heading).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/'.'destination_images';
            $image->move($path,$name);
        }
        $destination->banner_img = $name;
        $destination->save();
        return redirect()->back()->with('success','successfully added new destination');
    }
    else{
        $request->validate([
            'heading' => 'required|unique:destinations,heading,'.$request->id,
            'sub_heading' => 'required',
            'description' => 'required',
        ]);
        $destination = Destination::find($request->id);
        $destination->heading = $request->heading;
        $destination->subheading = $request->sub_heading;
        $destination->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().rand(0,100).str_replace(" ","",$request->heading).'.'.$image->getClientOriginalExtension();
            $path = public_path().'/'.'destination_images';
            $image->move($path,$name);
        $destination->banner_img = $name;
        }
        $destination->update();
        return redirect()->back()->with('success','successfully updated destination');

    }
    }
    public function list(){
        $destination = Destination::get();
        return view('Admin.destinations.destinationlist',compact('destination'));
    }
    public function delete($id){
        $destination = Destination::find($id)->delete();
        return redirect()->back()->with('success','successfully deleted destination');

    }

}
