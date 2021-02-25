<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Water extends Model
{
    protected $table = 'water';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'img',
        'description',
        'pinterest',
        'meta_title',
        'meta_description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
