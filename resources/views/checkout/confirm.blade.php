@extends('layouts.app')
 
@section('content')
	<div class="container">
		<div class="thumbnail" style="width: 50%">
		    <h1>Table resevation confirmation</h1>
		    <ul>
		    <li>Name: {{ session('cart.reservation_info')['name'] }}</li>
				<li>Table name: {{ session('cart.reservation_info')['table_name'] }}</li>
				<li>Contact person: {{ session('cart.reservation_info')['contact_person'] }}</li>
				<li>Phone: {{ session('cart.reservation_info')['phone'] }}</li>
				<li>Email: {{ session('cart.reservation_info')['email'] }}</li>
				<li>Number of Persons: {{ session('cart.reservation_info')['number_of_persons'] }}</li>
				<li>Order date: {{ session('cart.reservation_info')['order_date'] }}</li>
				<li>Order time: {{ session('cart.reservation_info')['order_time'] }}</li>
		    </ul>
		 
		    {!! Form::open(['route' => ['orders.store'], 'method' => 'post'])!!}
		        {!! Form::submit('Confirm' , ['class' => 'btn btn-success'])!!}
		    {!! Form::close() !!}
	    </div>
    </div>
 @endsection