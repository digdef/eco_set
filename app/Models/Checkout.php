<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'city',
        'phone',
        'email',
        'comment',
        'delivery',
        'payment',
        'total'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
