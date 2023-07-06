<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
use Auth;
class AmenitiesController extends Controller
{
    //
    public function index(){
        $amenities = Amenities::all();
        return view('Admin.amenities.index', compact('amenities'));
    }
    public function add(Request $request)
    {
        if ($request->has('amenitiesName')) {
            $Amenities =  new Amenities;
            $Amenities->name = $request->amenitiesName;
            $Amenities->admin_id = Auth::user()->id;
            $Amenities->save();
            return response()->json('Amenities has been added successfully');
        }
        return response()->json('Failed to add');
    }
    public function remove(Request $request){
        if ($request->has('removeId')) {
            $Amenities =  Amenities::find($request->removeId);
            $Amenities->delete();
            return response()->json('Amenities has been deleted successfully');
        }
        return response()->json('Failed to remove Amenities');
    }
    public function update(Request $request){
        if ($request->has('name')) {
            $Amenities =  Amenities::find($request->editId);
            $Amenities->name = $request->name;
            $Amenities->update();
            return response()->json('Amenities has been updated successfully');
        }
        return response()->json('Failed to remove Amenities');
    }
    
}
