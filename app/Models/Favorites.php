<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_product',
        'user'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public static function user($cookie)
    {
        $check_user = static::where("user", "=", $cookie)->get();
        return count($check_user);
    }
}
