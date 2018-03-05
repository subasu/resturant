<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    //relation of order and order_status
    public function orders()
    {
        return $this->hasMany('App\Models\Order','order_status_id');
    }
}
