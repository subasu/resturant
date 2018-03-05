<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modol extends Model
{
    //
    protected $table = 'models';
    public function sizes()
    {
        return $this->hasMany('App\Models\Size','model_id');
    }
    public function productSize()
    {
        return $this->belongsTo('App\Models\ProductSize','model_id');
    }
}
