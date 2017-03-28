@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{ route('tables.create') }}" class="btn btn-success">Add New Table</a>

<h1>Tables</h1>
	@foreach($tables->chunk(3) as $chunk)
	<div class="row">
		@foreach($chunk as $table)
				<div class="col-md-4 "  >
					<div class="thumbnail">
						<a href ="{{ route('tables.show', $table->id) }}"><img src="{{ $table->photo }}"></a>
						<p>Table name: {{ $table->name }}</p>
						<p>Min amount of people: {{ $table->min_amount }}</p>
						<p>Max amount of people: {{ $table->max_amount }}</p>
						@if(Auth::user() && Auth::user()->isAdmin())
						<a href="{{ route('tables.edit', $table->id) }}" class="btn btn-success">Edit</a>
						@endif
					</div>
				</div>
		@endforeach
	</div>
	@endforeach
	
</div>

@endsection