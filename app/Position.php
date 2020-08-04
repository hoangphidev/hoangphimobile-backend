<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Position extends Model
{
    protected $table = 'tb_positions';
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
