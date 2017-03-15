<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function getPriceAttribute($value)
    {
    	return number_format($value / 100, 2);
    }
}
