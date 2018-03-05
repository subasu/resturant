<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMessages extends Model
{
    //relation of new order and order messages
    public function newOrders()
    {
        return $this->belongsTo('App\Models\NewOrders');
    }

}
