@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-3">
			<h2>{{ $orders->name }}</h2>

		
			<p>{{$orders->email}}</p>
			<ul>
				<li>{$orders->total}} </li>
				<li>{{$orders->date}} </li>
			</ul>
		</div>
	</div>
</div>
@endsection