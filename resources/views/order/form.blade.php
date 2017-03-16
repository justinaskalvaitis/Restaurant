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
		{!! Form::text('name', null) !!}
	</div>

	<div class="form-group">
		<h4>Email</h4>
		{!! Form::text('email', null) !!}
	</div>

	<div class="form-group">
		<h4>Total</h4>
		{!! Form::text('total', null) !!}
	</div>

	<div class="form-group">
		<h4>Date</h4>
		{!! Form::date('date', null) !!}
	</div>

	{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}

	@if(isset($order))


	{!! Form::open(['route'=> ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}




	{!! Form::close() !!}
	@endif
</div>
@endsection