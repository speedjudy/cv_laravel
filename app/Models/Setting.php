<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    
    protected $fillable = [
        'waiting_time',
        'countdown_time'
    ];
}
