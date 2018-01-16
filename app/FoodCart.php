<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCart extends Model
{
    protected $table = 'food_cart';

    public function menu(){
        return $this->hasOne('App\Menu', 'id', 'item_id');
    }
}
