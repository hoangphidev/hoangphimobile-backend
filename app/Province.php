<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
     protected $table = "tb_provinces";

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
