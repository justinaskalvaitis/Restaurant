@extends('layouts.app')

@section('content')
<div class="container">

		@if(isset($dishes))
		<h2>Editing dish with name - {{$dishes->title}}</h2>
		{!! Form::model($dishes, ['route' => ['dishes.update', $dishes->id], 'method' => 'put']) !!}
		@else
		{!! Form::open(['route' => ['dishes.store'], 'method' => 'POST']) !!}
		@endif
	

	<div class="form-group">
	<h4>Name</h4>
	{!! Form::text('title', null) !!}
	</div>

	<div class="form-group">
	<h4>Description</h4>
	{!! Form::textarea('description', null) !!}
	</div>

	<div class="form-group">
	<h4>Netto price</h4>
	{!! Form::text('netto_price', null) !!}
	</div>

	<div class="form-group">
	<h4>Price</h4>
	{!! Form::text('price', null) !!}
	</div>

	<div class="form-group">
	<h4>Quantity</h4>
	{!! Form::number('quantity', null) !!}
	</div>
	
	<div class="form-group">
	<h4>Photo</h4>
	{!!Form::text('photo', null, ['class' => 'form-control']) !!}
	</div>
	



	{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}

	
	@if(isset($dishes))


	{!! Form::open(['route'=> ['dishes.destroy', $dishes->id], 'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}



	{!! Form::close() !!}
	@endif
</div>
@endsection