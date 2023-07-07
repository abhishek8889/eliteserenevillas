<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillaAmenities extends Model
{
    use HasFactory;

    public function amenitie(){
            return $this->hasOne(Amenities::class,'id','amenitie_id');
    }
    
}
