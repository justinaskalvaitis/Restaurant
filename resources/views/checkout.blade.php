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
			<td>Total: {{ session("cart.total")}} Euro</td>
			</tr>
		</tbody>

	</table>
		{!! Form::open(['route' => ['orders.store'], 'method' => 'POST']) !!}

		<div>
			<h3>Personal information</h3>
			<div class="form-group">
				<h4>Your name:</h4>
				{!! Form::text('contact_person', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
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


			
		<!-- </div>

		
		<a href="{{ route('orders.create') }}" id="buyout" class="btn btn-success">Buy</a> -->


{!! Form::close() !!}



</div>

@endsection