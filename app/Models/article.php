<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'img',
        'description',
        'pinterest'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
