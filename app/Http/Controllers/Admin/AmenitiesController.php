<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;
use Auth;
use App\Models\Villas;

class AmenitiesController extends AdminBaseController
{
    //
    public function index(){
        $amenities = Amenities::all();
        return view('Admin.amenities.index', compact('amenities'));
    }
    public function add(Request $request)
    {
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required|unique:amenities',
                'slug' => 'required|unique:amenities',
            ]);
            
            $Amenities =  new Amenities;
            $Amenities->name = $request->name;
            $Amenities->slug = $request->slug;
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
            $request->validate([
                'name' => 'required|unique:amenities,name,' . $request->editId,
                'slug' => 'required|unique:amenities,slug,' . $request->editId,
            ]);
            
            $Amenities =  Amenities::find($request->editId);
            $Amenities->name = $request->name;
            $Amenities->slug = $request->slug;
            $Amenities->update();
            return response()->json('Amenities has been updated successfully');
        }
        return response()->json('Failed to remove Amenities');
    }
    
}
