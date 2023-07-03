<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VillaController extends Controller
{
   public function index(){

   return view('Admin.villas.index');
   }
   public function addProcc(Request $request){
    echo '<pre>';
    print_r($request->all());
    echo '</pre>';
    $request->validate([
        'villaname' => 'required',
        'slug' => 'required',
        'location' => 'required'
    ]);
   }
}
