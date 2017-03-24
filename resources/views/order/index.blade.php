@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Orders</h1>
	@foreach($orders->chunk(3) as $chunk)
	<div class="row">
		@foreach($chunk as $order)
		<div class="col-md-4 ">
			<div class="thumbnail ">
				<ul class="{{ $order->getReservationClass() }}">
					<li>Name: {{ $order->name }}</li>
					<li>Email: {{ $order->email }}</li>
					<li>Total: {{ $order->total }}</li>
					<li>Date: {{ $order->date }}</li>
				</ul>
			@if(Auth::user() && Auth::user()->isAdmin())
			<a href="{{ route('orders.edit', $order->id) }}" class="btn btn-success">Edit</a>
			@endif
			</div>
		</div>
		@endforeach
	</div>
	@endforeach
</div>


@endsection