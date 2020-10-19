<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class howToBuy extends Model
{
    protected $table = 'how_to_buys';

    protected $primaryKey = 'id';

    protected $fillable = [
        'text_icon1',
        'text_icon2',
        'text_icon3',
        'text_icon4',
        'text'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
