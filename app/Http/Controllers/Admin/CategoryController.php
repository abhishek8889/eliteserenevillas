<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
            $category = Category::get();
            return view('Admin.category.index',compact('category'));
    }
    public function catgoriesadd(Request $request){
        if($request->id){
            $request->validate([
                'name' =>'required',
                'slug' => 'unique:servicelists,slug,'.$request->id,
            ]);
            $category = Category::find($request->id);
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->update();
            return response()->json('Successfully updated data');
        }else{
            $request->validate([
            'name' =>'required',
            'slug' => 'unique:servicelists',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        }
        return response()->json('Successfully saved data');
    }
    public function delete(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return response()->json('successfully deleted data');
    }
}
