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