@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-3">
			<h2>{{ $tables->name }}</h2>
			<img src="{{ asset($tables->photo) }}" class="img-responsive" width="500" >
			<ul>
				<li>Min amount: {{$tables->min_amount}} </li>
				<li>Max amount: {{$tables->max_amount}}</li>
			</ul>
			
		</div>
	</div>
</div>
@endsection