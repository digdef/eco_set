<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'title_price',
        'type',
        'meta_description',
        'meta_title',
        'url',
        'meta_description_price',
        'meta_title_price',
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
