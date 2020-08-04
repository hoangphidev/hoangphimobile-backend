<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tb_news';

    public function getbrand()
    {
    	return $this->belongsTo('App\Brand','brand_id','id');
    }

    protected $hidden = [
        'updated_at',
    ];
}
