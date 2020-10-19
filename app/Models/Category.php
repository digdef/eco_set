<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
