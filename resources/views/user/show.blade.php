@extends('layouts.app')

@section('content')
<div class="container">
	<div class="background">

		<h1>User: {{ $user->name }} {{ $user->surname }}</h1>
		<div class="row">
			<div class="col-md-6">
				<ol>
					<li>Name: {{ $user->name }}</li>
					<li>Surname: {{ $user->surname }}</li>	
				</ol>
			</div>
			<div class="col-md-6">
				<ol>
					<li>Email: {{ $user->email }}</li>
					<li>Phone: {{ $user->phonenumber }}</li>
					<li>Address: {{ $user->address }}</li>	
					<li>Country: {{ $user->country }}</li>		
				</ol>
			</div>
		</div>
	</div>

			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
			{!! Form::open(['route'=> ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}




	{!! Form::close() !!}
		

		<div class="thumbnail">

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
		    <li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="profile">
		    <ol>
			    <li>Email: {{ $user->email }}</li>
				<li>Phone number: {{ $user->phonenumber }}</li>
				<li>Address: {{ $user->address }}</li>
				<li>City: {{ $user->city }}</li>
				<li>Zipcode: {{ $user->zipcode }}</li>
				<li>Account type: {{ $user->type }}</li>
			</ol>
			</div>
		    <div role="tabpanel" class="tab-pane" id="orders">

		   	<table  class="table table-hover whiteColors">
		   		<thead>
			   		<tr>
			   			<td>Name</td>
			   			<td>Contact person</td>
			   			<td>Table name</td>
			   			<td>Phone</td>
			   			<td>Number of persons</td>
			   			<td>Order date</td>
			   			<td>Total</td>
			   			<td>Delete</td>
			   		</tr>
		   		</thead>
		   		<tbody>
		   			@foreach($user->orders as $order)
			   			<tr class='{{ $order->getReservationClass() }}'>
			   				<td>{{ $order->name}}</td>
			   				<td>{{ $order->contact_person}}</td>
			   				<td>{{ $order->table_name}}</td>
			   				<td>{{ $order->phone}}</td>
			   				<td>{{ $order->number_of_persons}}</td>
			   				<td>{{ $order->total}}</td>
			   				<td>{{ $order->order_date}}</td>
			   				<td>
			   				{!! Form::open(['route'=> ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
							</td>
							
			   			</tr>
		   			@endforeach
		   		</tbody>
		   	</table>
		    </div>
		  </div>
		</div>
	</div>
</div>


@endsection