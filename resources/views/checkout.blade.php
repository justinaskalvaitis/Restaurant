@extends('layouts.app')

@section('content')

<div class="container">
	


	<table class="table table-bordered" style="color: black; background-color: white;">
		<thead>

			<td>Name</td>
			<td>Quantity</td>
			<td>Price</td>
			<td></td>

		</thead>
	
		<tbody>	
			@foreach(session('cart.items') as $item)
			<tr>
				
				<td><img src="{{ $item['photo']}}" style="width: 150px"></img> {{ $item['title']}}</td>
				<td>{{ $item['quantity']}}</td>
				<td>{{ $item['price']}}</td>
				<td><a href="{{ route('cart.delete_item', ['id' => $item['id']]) }}"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 3rem; color: grey;"></i></a></td>


			</tr>
			@endforeach
			<tr>
			<td>Without tax: {{ $tax }}</td>
			<td>Tax: {{ session('cart.total') - $tax }}</td>
			<td>Total: {{ session("cart.total")}} Euro</td>

			</tr>
		</tbody>

	</table>
	
		{!! Form::open(['route' => ['checkout.store'], 'method' => 'POST']) !!}

		<div>
			<h3>Personal information</h3>
			<div class="form-group">
				<h4>Contact person:</h4>
				{!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
			</div>

			<div class="form-group">
			<h4>Name</h4>
				{!! Form::text('name', Auth::user() ? Auth::user()->name : null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
			</div>

			<div class="form-group">
			<h4>Email</h4>
				{!! Form::email('email', Auth::user() ? Auth::user()->email : null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
			</div>

			<div class="form-group">
				<h4>Number of persons:</h4>
				{!! Form::number('number_of_persons', null, ['class' => 'form-control', 'placeholder' => 'Number of persons']) !!}
			</div>

			<div class="form-group">
            {!! Form::Label('table_name', 'Select Table:') !!}
            <select class="form-control" name="table_name">

               @foreach($tables as $table)
                    <option value="{{$table->id}}">{{$table->name}}</option>
                @endforeach
            </select>
       		</div>

			<div class="form-group">
				<h4>Your phone:</h4>
				{!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'phone number']) !!}
			</div>

			<div class="form-group">
				<h4>Order date:</h4>
				{!! Form::date('order_date', null, ['class' => 'form-control', 'placeholder' => 'date']) !!}
			</div>

			<div class="form-group">
				<h4>Order time:</h4>
				{!! Form::time('order_time', null, ['class' => 'form-control', 'placeholder' => 'time']) !!}
			</div>

	@if(Auth::check())
	{!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
	@endif
	{!! Form::close() !!}




{!! Form::close() !!}



</div>

@endsection