@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		
		<div class="col-md-6">
			<h1>Contact</h1>
			<ul class="white" style="width: 50%;">
				<li>{{ $contacts['title']}}</li>
				<li>{{ $contacts['address']}}</li>
				<li>{{ $contacts['email']}}</li>
				<li>{{ $contacts['phone']}}</li>
			</ul>
		</div>

		<div class="col-md-6 thumbnail">
			{!! $contacts->hours !!}
		</div>
		@if(Auth::user() && Auth::user()->isAdmin())
			<a href="{{ route('contacts.edit', $contacts->id) }}" class="btn btn-success">Edit</a>
		@endif
	</div>
</div>
{!! $contacts['map'] !!}


@endsection