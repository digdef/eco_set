<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table = 'abouts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'img1',
        'text1',
        'img2',
        'text2',
        'text3'
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
