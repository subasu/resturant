<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //relation of size and product
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function models()
    {
        return $this->belongsToMany('App\Models\Modol');
    }
    public function productSize()
    {
        return $this->belongsTo('App\Models\ProductSize');
    }
}
