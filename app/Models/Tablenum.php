<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tablenum extends Model
{
    protected $table = 'table_num';
    
    protected $fillable = [
        'left_num',
        'right_num'
    ];
}
