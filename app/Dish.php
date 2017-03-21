<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

	protected $fillable = [
	'title',
	'description',
	'netto_price',
	'price',
	'quantity',
	'photo',
	];



    public function getPriceAttribute($value)
    {
    	return number_format($value / 100, 2);
    }

    public function getNettoPriceAttribute($value)
    {
    	return number_format($value / 100, 2);
    }

    public function order_lines(){
    	return $this->hasMany('App\OrderLine');
    }

}
