<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "tb_banners";
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
