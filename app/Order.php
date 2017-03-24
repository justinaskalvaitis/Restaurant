<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
   protected $fillable = [
   'name', 'email', 'total', 'date', 'user_id', 'contact_person', 'phone', 'order_date', 'order_time', 'table_name', 'number_of_persons'
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

  public function getReservationClass() 
  {
    $date = Carbon::parse($this->order_date);

    if($date->isToday()){
      return 'danger';
    } elseif ($date->isTomorrow()){
      return 'warning';
    } elseif ($date->isPast()){
      return 'success';
    }
  }

}
