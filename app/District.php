<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
     protected $table = "tb_districts";

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
