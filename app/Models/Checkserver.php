<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkserver extends Model
{
    protected $table = 'checkserver';
    
    protected $fillable = [
        'progress',
        'countup_progress',
        'date'
    ];
}
