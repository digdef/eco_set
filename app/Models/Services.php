<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'img',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
