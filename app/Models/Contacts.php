<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'address',
        'schedule',
        'email',
        'email_to_send',
        'phone',
        'facebook',
        'vk',
        'instagram',
        'whatsapp'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
