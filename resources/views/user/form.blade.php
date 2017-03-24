@extends('layouts.app')

@section('content')
<div class="container">
<h2>Editing user - {{$user->name}}</h2>
		{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

	<div class="form-group">
		<h4>Name</h4>
		{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
	</div>

	<div class="form-group">
		<h4>Surname</h4>
		{!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'surname']) !!}
	</div>

	<div class="form-group">
		<h4>Date of birth</h4>
		{!! Form::date('dateofbirth', null, ['class' => 'form-control', 'placeholder' => 'dateofbirth']) !!}
	</div>

	<div class="form-group">
		<h4>Phone number</h4>
		{!! Form::text('phonenumber', null, ['class' => 'form-control', 'placeholder' => 'phonenumber']) !!}
	</div>

	<div class="form-group">
		<h4>Address</h4>
		{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'address']) !!}
	</div>

	<div class="form-group">
		<h4>City</h4>
		{!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'city']) !!}
	</div>

	<div class="form-group">
		<h4>Zipcode</h4>
		{!! Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => 'zipcode']) !!}
	</div>

	<div class="form-group">
		<h4>Account type</h4>
		{!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'type']) !!}
	</div>

	
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	
	{!! Form::close() !!}



</div>
@endsection