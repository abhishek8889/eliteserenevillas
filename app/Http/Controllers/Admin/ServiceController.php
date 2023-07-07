<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Servicelist;


class ServiceController extends Controller
{
    public function index(){
        $services = Servicelist::get();
        return view('Admin.services.index',compact('services'));
    }
    public function serviceadd(Request $request){
        // return $request->all();
        
        if($request->id){
            $request->validate([
                'name' =>'required',
                'slug' => 'unique:servicelists,slug,'.$request->id,
            ]);
            $services = Servicelist::find($request->id);
            $services->name = $request->name;
            $services->slug = $request->slug;
            $services->update();
            return response()->json('Successfully updated data');
        }else{
            $request->validate([
            'name' =>'required',
            'slug' => 'unique:servicelists',
        ]);
        $services = new Servicelist;
        $services->name = $request->name;
        $services->slug = $request->slug;
        $services->save();
        }
        return response()->json('Successfully saved data');
    }
    public function delete(Request $request){
        // return $request->all();
        $service = Servicelist::find($request->id);
        $service->delete();
        return response()->json('successfully deleted service');

    }
}
