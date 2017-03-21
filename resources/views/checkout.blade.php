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
				<td><a href="#"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 3rem; color: grey;"></i></a></td>

			</tr>
			@endforeach
			<tr>
			<td>Total: {{ session("cart.total")}} Euro</td>
			</tr>
		</tbody>
		
	</table>
		<a href="{{ route('orders.create') }}" id="buyout" class="btn btn-success">Buy</a>






</div>

@endsection