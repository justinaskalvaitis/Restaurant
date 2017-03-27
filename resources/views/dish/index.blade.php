@extends('layouts.app')

@section('content')
<div class="container">
@if(Auth::user() && Auth::user()->isAdmin())
	<a href="{{ route('dishes.create') }}" class="btn btn-success">New</a>
	<a href="{{ route('orders.index') }}" class="btn btn-warning pull-right">Orders</a>
@endif
<h1>Dishes</h1>
	@foreach($dishes->chunk(3) as $chunk)
	<div class="row">

		@foreach($chunk as $dish)
				<div class="col-md-4 "  >
					<div class="thumbnail thumbnailHover">
						<a href ="{{ route('dishes.show', $dish->id) }}"><img src="{{ $dish->photo }}"></a>
						<p>{{ $dish->description }}</p>
						<p>Quantity: {{ $dish->quantity }}</p>
						<p>Price: {{ $dish->price }} eur</p>
						@if(Auth::user() && Auth::user()->isAdmin())
						<a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-success">Edit</a>
						@endif
						<a href="#" data-id="{{ $dish->id }}" class="btn btn-warning add-to-cart">Add to cart</a>
					</div>
				</div>
		@endforeach
	</div>
	@endforeach
</div>

@endsection