@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-3">
		<div class="thumbnail">
			<h2>{{ $order->name }}</h2>

		
			<p>{{$order->email}}</p>
			<ul>
				<li>{{$order->total}} </li>
				<li>{{$order->date}} </li>
			</ul>
			</div>
		</div>
	</div>
	
	<table class="table table-bordered" style="color: black; background-color: white;">
		<thead>
			<tr>
				<td>Name</td>
				<td>Quantity</td>
				<td>Price</td>
				<td></td>
			</tr>
		</thead>

		@if(count($order->order_lines()) > 0)

		<tbody>	
			@foreach($order->order_lines as $item)
			<tr>			
				<td><img src="{{ $item->dish->photo}}" style="width: 150px"></img> {{ $item->dish->title}}</td>
				<td>{{ $item->quantity }}</td>
				<td>{{ $item->dish->price}}</td>
				
				<td><a id="deleteItem" href="#"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 3rem; color: grey;"></i></a></td>
				
			</tr>
			@endforeach
			<tr>
			<td>Total: {{ $order->total }} Euro</td>
			</tr>
			
		</tbody>
		@endif
	</table>
</div>
@endsection