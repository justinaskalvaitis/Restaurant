<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
   'name', 'email', 'total', 'date', 'user_id', 'contact_person', 'phone', 'order_date', 'order_time'
   ];
   public function order_lines()
    {
     return $this->hasMany('App\OrderLine');
 	}
 	public function user()
	{
    return $this->belongsTo('App\User');
	}  
	public function table()
	{
	return $this->belongsTo('App\Table');
	}


}
