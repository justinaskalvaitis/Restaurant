@extends('layouts.app')

@section('content')
<div class="container">

	@if(isset($order))
		<h2>Editing order - {{$order->name}}</h2>
		{!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'put']) !!}
	@else
		{!! Form::open(['route' => ['orders.store'], 'method' => 'POST']) !!}
	@endif
	
	<div class="form-group">
	<h4>Name</h4>
		{!! Form::text('name', Auth::user() ? Auth::user()->name : null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
	</div>

	<div class="form-group">
	<h4>Email</h4>
		{!! Form::email('email', Auth::user() ? Auth::user()->email : null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
	</div>

	<div class="form-group">
	<h4>Phone number</h4>
		{!! Form::text('phonenumber', Auth::user() ? Auth::user()->phonenumber : null, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
	</div>

	<div class="form-group">
	<h4>Table name</h4>
		{!! Form::text('table_name',  null, ['class' => 'form-control', 'placeholder' => 'table name']) !!}
	</div>

	<div class="form-group">
	<h4>Reservation date</h4>
		{!! Form::date('order_date',  null, ['class' => 'form-control', 'placeholder' => 'date']) !!}
	</div>

	<div class="form-group">
	<h4>Reservation time</h4>
		{!! Form::time('order_time', null, ['class' => 'form-control', 'placeholder' => 'date']) !!}
	</div>

	

	@if(session('cart.total'))
	<p>Total: {{ session('cart.total')}} &euro;</p>
	
	@endif 
	
	
	@if(Auth::check())
	{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
	@endif
	{!! Form::close() !!}

	@if(isset($order))


	{!! Form::open(['route'=> ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}




	{!! Form::close() !!}
	@endif
</div>
@endsection