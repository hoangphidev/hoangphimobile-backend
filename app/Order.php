<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "tb_orders";
    public function getproduct()
    {
    	return $this->belongsTo('App\Product','product_id','id');
    }
}
