<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'type',
        'content'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
