<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockToProducts extends Model
{
    protected $table = 'stock_to_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_stock',
        'id_product'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
