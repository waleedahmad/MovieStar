<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodOrderItem extends Model
{
    protected $table = 'food_order_items';

    public function menu(){
        return $this->hasOne('App\Menu', 'id', 'item_id');
    }
}
