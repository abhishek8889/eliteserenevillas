<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villas extends Model
{
    use HasFactory;

    public function address(){
        return $this->hasOne(Address::class,'villa_id','id');
    }
    public function media(){
        return $this->hasMany(Media::class,'villa_id','id');
    }
    public function amenities(){
        return $this->hasMany(VillaAmenities::class,'villa_id','id');
    }
    public function service(){
        return $this->hasMany(Service::class,'villa_id','id');
    }
    public function category(){
        return $this->hasMany(Category::class,'id','villa_id');
    }
    public function customedata(){
        return $this->hasMany(CustomDetail::class,'villa_id','id');
    }
    public function villafeatureimage(){
        return $this->hasOne(Media::class,'id','banner_id');
    }
    public function pricing(){
        return $this->hasMany(Pricing::class,'villa_id','id');
    }
}
