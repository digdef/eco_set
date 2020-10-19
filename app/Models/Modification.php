<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    protected $table = 'modifications';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'category'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
