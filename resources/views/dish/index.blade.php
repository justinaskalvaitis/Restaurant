@extends('layouts.app')

@section('content')
<div class="container">
<h1>Dishes</h1>
	@foreach($dishes->chunk(3) as $chunk)
	<div class="row">
		@foreach($chunk as $dish)
				<div class="col-md-4 justify"  >
					<div class="thumbnail">
						<img src="{{ $dish->photo }}">
						<p>{{ $dish->description }}</p>
						<p>{{ $dish->quantity }} eur</p>
						<p>{{ $dish->price }} eur</p>
					</div>
				</div>
		@endforeach
	</div>
	@endforeach
</div>

@endsection