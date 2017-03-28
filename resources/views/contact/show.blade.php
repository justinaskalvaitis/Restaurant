@extends('layouts.app')

@section('content')
<div class="container">
	@if(Auth::user() && Auth::user()->isAdmin())
			<a href="{{ route('contacts.edit', $contacts->id) }}" class="btn btn-success">Edit Contact</a>
	@endif
	<div class="row">
		
		<div class="col-md-6">
			<h1>Contact</h1>
			<ul class="white">
				<li>{{ $contacts['title']}}</li>
				<li>{{ $contacts['address']}}</li>
				<li>{{ $contacts['email']}}</li>
				<li>{{ $contacts['phone']}}</li>
			</ul>
		</div>

		<div class="col-md-6 thumbnail">
			{!! $contacts->hours !!}
		</div>
		
	</div>
</div>
{!! $contacts['map'] !!}


@endsection