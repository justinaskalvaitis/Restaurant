@extends('layouts.app')
 
 @section('content')
    <h1>Table resevation confirmation</h1>
 
    <ul>
		<li>Name: {{ session('cart.reservation_info')['table_name'] }}</li>
    </ul>
 
    {!! Form::open(['route' => ['orders.store'], 'method' => 'post'])!!}
        {!! Form::submit('Confirm' , ['class' => 'btn btn-success'])!!}
    {!! Form::close() !!}
 @endsection