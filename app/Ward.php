<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = "tb_wards";

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
