<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title1',
        'link1',
        'img1',
        'title2',
        'link2',
        'img2',
        'title3',
        'link3',
        'img3',
        'title4',
        'link4',
        'img4',
        'title5',
        'link5',
        'img5',
        'title6',
        'link6',
        'img6'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
