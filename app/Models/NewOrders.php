<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewOrders extends Model
{
    //relation of users and orders
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    //relation of orders and order messages
    public function orderMessages()
    {
        return $this->hasMany('App\Models\OrderMessages','new_order_id');
    }

}
