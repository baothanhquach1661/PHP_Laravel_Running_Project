<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ward_name', 'type', 'maqh'
    ];

    protected $primaryKey = 'xaid';
    protected $table = 'tbl_xaphuongthitran';

    public function city()
    {
        return $this->belongsTo(City::class, 'matp', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'maqh', 'id');
    }
}
