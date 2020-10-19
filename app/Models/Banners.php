<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    protected $primaryKey = 'id';

    protected $fillable = [
        'link1',
        'link2',
        'link3',
        'title1',
        'title2',
        'title3',
        'img1',
        'img2',
        'img3'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
