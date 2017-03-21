@extends('layouts.app')

@section('content')


<div class="container">

	@if(isset($table))
		<h2>Editing table - {{$table->name}}</h2>
		{!! Form::model($table, ['route' => ['tables.update', $table->id], 'method' => 'put']) !!}
	@else
		{!! Form::open(['route' => ['tables.store'], 'method' => 'POST']) !!}
	@endif

	<div class="form-group">
		<h4>Table name</h4>
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
	</div>

	<div class="form-group">
		<h4>Min amout of people per table</h4>
		{!! Form::number('min_amount', null, ['class' => 'form-control', 'placeholder' => 'min_amount']) !!}
	</div>
	
	<div class="form-group">
		<h4>Max amount of people per table</h4>
		{!! Form::number('max_amount', null, ['class' => 'form-control', 'placeholder' => 'max_amount']) !!}
	</div>

	<div class="form-group">
		<h4>Photo</h4>
		{!!Form::text('photo', null, ['class' => 'form-control']) !!}
	</div>

	@if(Auth::check())
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	@endif
	{!! Form::close() !!}

	
	@if(isset($table))


	{!! Form::open(['route'=> ['tables.destroy', $table->id], 'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}




	{!! Form::close() !!}
	@endif


</div>




@endsection
