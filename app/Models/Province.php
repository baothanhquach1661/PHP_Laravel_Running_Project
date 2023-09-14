<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'province_name', 'type', 'matp'
    ];

    protected $primaryKey = 'maqh';
    protected $table = 'tbl_quanhuyen';
}
