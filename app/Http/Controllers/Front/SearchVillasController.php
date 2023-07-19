<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Villas;
use App\Models\Amenities;
use App\Models\Category;
use App\Models\Pricing;
use App\Models\Servicelist;
use App\Models\Address;
use Sabre\VObject\Reader;
use League\Csv\Writer;
// use Illuminate\Support\Facades\Log;

class SearchVillasController extends Controller
{
    public function index(Request $request){
        $PropertyTypes = Category::all();
        $Amenities = Amenities::all();
        $Servicelists = Servicelist::all();
        $states = Address::distinct()->get('state');

        // Setting variable for filter data    
        $minPrice = (int) $request->minPrice;
        $maxPrice = (int) $request->maxPrice;
        $Guest = (int) $request->Guest;
        $whereToNext = $request->whereToNext;
        $DestinationId = json_decode($request->Destination);
        $PropertyTypeId = json_decode($request->PropertyType);
        $amenitiesId = json_decode($request->Amenities);

        $query = Villas::with('address', 'media', 'amenities', 'service', 'villafeatureimage', 'pricing');

        // Apply price range filter
        if (!empty($minPrice) && !empty($maxPrice)) {
            $query->whereHas('pricing', function ($pricingQuery) use ($minPrice, $maxPrice) {
                $pricingQuery->whereBetween('price', [$minPrice, $maxPrice]);
            });
        }

        // Apply maximum guest capacity filter
        if (!empty($Guest)) {
            $query->where('max_guest', '>=', $Guest);
        }

        // Apply location filter
        if (!empty($whereToNext) && $whereToNext != 'All location' && $whereToNext != 'where to next?') {
            if (!is_array($whereToNext)) {
                $whereToNext = [$whereToNext];
            }
            $query->whereHas('address', function ($addressQuery) use ($whereToNext) {
                $addressQuery->whereIn('state', $whereToNext);
            });
        }

        // Apply destination filter
        if (!empty($DestinationId)) {
            $query->whereHas('address', function ($addressQuery) use ($DestinationId) {
                $addressQuery->whereIn('state', $DestinationId);
            }, '=', count($DestinationId));
        }

        // Apply property type filter
        if (!empty($PropertyTypeId)) {
            $query->whereIn('category_id', $PropertyTypeId);
        }

        // Apply amenities filter
        if (!empty($amenitiesId)) {
            $query->whereHas('amenities', function ($amenitiesQuery) use ($amenitiesId) {
                $amenitiesQuery->whereIn('villa_amenities.amenitie_id', $amenitiesId);
            }, '>=', count($amenitiesId)); // Change '=' to '>=' to fetch villas that have all of the specified amenities
        }

        $villas = $query->get();
        return view('Front.villas.searchVillas',compact('villas','PropertyTypes','Amenities','Servicelists','states'));
    }
}
