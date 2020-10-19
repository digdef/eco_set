<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'name',
        'phone',
        'text'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
