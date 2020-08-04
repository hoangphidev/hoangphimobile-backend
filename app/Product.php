<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tb_products';

    public function getbrand()
    {
    	return $this->belongsTo('App\Brand','brand_id','id');
    }

    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at',
    ];
}
