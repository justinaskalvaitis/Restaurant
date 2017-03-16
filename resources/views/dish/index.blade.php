@extends('layouts.app')

@section('content')
<div class="container">
<h1>Dishes</h1>
	@foreach($dishes->chunk(3) as $chunk)
	<div class="row">
		@foreach($chunk as $dish)
				<div class="col-md-4 "  >
					<div class="thumbnail">
						<a href ="{{ route('dishes.show', $dish->id) }}"><img src="{{ $dish->photo }}"></a>
						<p>{{ $dish->description }}</p>
						<p>Quantity: {{ $dish->quantity }}</p>
						<p>Price: {{ $dish->price }} eur</p>
						<a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-success">Edit</a>
					</div>
				</div>
		@endforeach
	</div>
	@endforeach
</div>

@endsection