<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city(){
        return $this->belongsTo(City::class,'city_id','matp');
    }

      public function province(){
        return $this->belongsTo(Province::class,'province_id','maqh');
    }

      public function ward(){
        return $this->belongsTo(Ward::class,'ward_id','xaid');
    }

      public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
