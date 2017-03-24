@extends('layouts.app')

@section('content')

<div class="container">
<div class="thumbnail"> 
@if(Auth::user() && Auth::user()->isAdmin())
	<table class="table table-hover whiteColor">
		<thead>
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>Surname</td>
				<td>Type</td>
				<td>Email</td>
				<td>Orders</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $index => $user)
			<tr>
				<td>{{ $index+1 }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->surname }}</td>
				<td><span class="badge">{{ $user->type }}</span></td>
				<td>{{ $user->email }}</td>
				<td>{{ count($user->orders) }}</td>
				<td><a href="{{ route('users.show', $user->id) }}">View</a></td>
			</tr>
		@endforeach
		</tbody>
	</table>
@endif
</div>
</div>


@endsection