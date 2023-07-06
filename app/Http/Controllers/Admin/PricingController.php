<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pricing;
use DateTime;
class PricingController extends Controller
{
    public function pricingAdd(Request $request){
        $request->validate([
           'price' =>'required',
           'to_date' => 'required',
           'from_date' => 'required',
        ]);
        
        $start = new DateTime($request->from_date);
        $end = new DateTime($request->to_date);
        $dates = array();
        while ($start <= $end) {
            $dates[] = $start->format('Y-m-d');
            $start->modify('+1 day');
        }
       foreach($dates as $date){
         $pricing = Pricing::where('date',$date)->first();
         if($pricing){
            $price = Pricing::find($pricing->id);
            $price->date = $date;
            $price->price = $request->price;
            $price->villa_id = $request->villa_id;
            $price->update();
         }else{
            $price = new Pricing;
            $price->date = $date;
            $price->price = $request->price;
            $price->villa_id = $request->villa_id;
            $price->save();
         }
       }
        return redirect()->back()->with('success','successfully added price');
     }
     public function delete($id){
      $price = Pricing::find($id);
      $price->delete();
      return redirect()->back()->with(['success' => 'successfully deleted pricing']);

     }
    
}
