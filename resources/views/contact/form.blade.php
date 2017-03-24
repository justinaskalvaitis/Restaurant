@extends('layouts.app')

@section('content')

<div class="container">

{!! Form::open(['route' => ['contact.store'], 'method' => 'POST']) !!}
<div class="form-group">
	<h4>Title</h4>
	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
</div>

<div class="form-group">
	<h4>Address</h4>
	{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'address']) !!}
</div>

<div class="form-group">
	<h4>Email</h4>
	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
</div>

<div class="form-group">
	<h4>Phone</h4>
	{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
</div>

<div class="form-group">
	<h4>Hours</h4>
	{!! Form::textarea('hours', null, ['class' => 'form-control', 'placeholder' => 'hours']) !!}
</div>

<div class="form-group">
	<h4>Map</h4>
	{!! Form::textarea('map', null, ['class' => 'form-control', 'placeholder' => 'map']) !!}
</div>

{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}




{!! Form::close() !!}
</div>
@endsection