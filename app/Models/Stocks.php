<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    protected $table = 'stocks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'img',
        'description',
        'percent',
        'finish'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
