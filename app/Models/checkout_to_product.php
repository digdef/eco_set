<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class checkout_to_product extends Model
{
    protected $table = 'checkout_to_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'price',
        'number',
        'id_checkout'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
