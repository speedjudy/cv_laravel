<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $table = 'pool_list';
    
    protected $fillable = [
        'number',
        'date',
        'step',
        'order_num'
    ];
}
