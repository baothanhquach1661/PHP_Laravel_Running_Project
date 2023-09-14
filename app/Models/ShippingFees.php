<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingFees extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'fee_matp', 'fee_maqh', 'fee_xaid', 'shipping_fee'
    ];

    protected $primaryKey = 'fee_id';
    protected $table = 'tbl_shippingfees';

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'fee_matp', 'matp');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province', 'fee_maqh', 'maqh');
    }

    public function ward()
    {
        return $this->belongsTo('App\Models\Ward', 'fee_xaid', 'xaid');
    }
}
