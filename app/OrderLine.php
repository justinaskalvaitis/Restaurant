<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{

	public $timestamps = false;

	protected $fillable = ['order_id', 'dish_id', 'quantity', 'total', 'user_id'];

	public function order()
	{
		return $this->belongsTo('App\Order');
	}

	public function dish()
	{
		return $this->belongsTo('App\Dish');
	}
}
