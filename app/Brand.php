<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "tb_brands";
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
