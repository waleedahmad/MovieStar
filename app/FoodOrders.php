<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodOrders extends Model
{
    protected $table = 'food_orders';

    protected $fillable = ['user_id', 'total', 'completed', 'paid'];

    public function items(){
        return $this->hasMany('App\FoodOrderItem', 'order_id', 'id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
