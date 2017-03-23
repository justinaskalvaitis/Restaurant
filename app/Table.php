<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'name', 'min_amount', 'max_amount', 'photo', 'number_of_persons'
    ];

    public function order()
    {
    	return $this->hasMany('App\Order');
    }
}
