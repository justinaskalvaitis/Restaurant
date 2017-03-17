@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-3">
			<h2>{{ $dishes->title }}</h2>

			<img src="{{ $dishes->photo }}" class="img-responsive" width="500" >
			<p>{{$dishes->description}}</p>
			<ul>
				<li>Price: {{$dishes->price}} eur</li>
				<li>Quantity: {{$dishes->quantity}}</li>
			</ul>
		</div>
	</div>
</div>
@endsection