<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['title', 'address', 'email', 'phone', 'hours', 'map' ];
}
