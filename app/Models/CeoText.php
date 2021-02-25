<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CeoText extends Model
{
    protected $table = 'ceo_text';

    protected $primaryKey = 'id';

    protected $fillable = [
        'text1',
        'text2',
        'text3',
        'text4',
        'text5',
        'text_water',
        'title1',
        'title2',
        'title3',
        'title4',
        'id_content',
        'id_modification',
        'meta_title',
        'meta_description',
        'meta_description_price',
        'meta_title_price',
        'title_price',
        'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
