@extends('layouts.app')

@section('content')
<div class="container">

	@if(isset($order))
		<h2>Editing order - {{$order->name}}</h2>
		{!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'put']) !!}
	@else
		{!! Form::open(['route' => ['orders.store'], 'method' => 'POST']) !!}
	@endif
	
	<div class="form-group">
	<h4>Name</h4>
		{!! Form::text('name', Auth::user() ? Auth::user()->name : null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
	</div>

	<div class="form-group">
	<h4>Email</h4>
		{!! Form::email('email', Auth::user() ? Auth::user()->email : null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
	</div>

	<div class="form-group">
	<h4>Phone number</h4>
		{!! Form::text('phonenumber', Auth::user() ? Auth::user()->phonenumber : null, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
	</div>

	<div class="form-group">
	<h4>Table name</h4>
		{!! Form::text('table_name',  null, ['class' => 'form-control', 'placeholder' => 'table name']) !!}
	</div>

	<div class="form-group">
	<h4>Number of persons</h4>
		{!! Form::text('number_of_persons',  null, ['class' => 'form-control', 'placeholder' => 'number_of_persons']) !!}
	</div>

	<div class="form-group">
	<h4>Reservation date</h4>
		{!! Form::date('order_date',  null, ['class' => 'form-control', 'placeholder' => 'date']) !!}
	</div>

	<div class="form-group">
	<h4>Reservation time</h4>
		{!! Form::time('order_time', null, ['class' => 'form-control', 'placeholder' => 'date']) !!}
	</div>

	@if(Auth::check())
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	@endif
	{!! Form::close() !!}

	@if(isset($order))


	{!! Form::open(['route'=> ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}




	{!! Form::close() !!}
	@endif

	<table class="table table-bordered" style="color: black; background-color: white;">
		<thead>
			<tr>
				<td>Name</td>
				<td>Quantity</td>
				<td>Price</td>
				<td></td>
			</tr>
		</thead>

		@if(count($order->order_lines()) > 0)

		<tbody>	
			@foreach($order->order_lines as $item)
			<tr>			
				<td><img src="{{ $item->dish->photo}}" style="width: 150px"></img> {{ $item->dish->title}}</td>
				<td>{{ $item->quantity }}</td>
				<td>{{ $item->dish->price}}</td>
				
				<td><a id="deleteItem" href="#"><i class="fa fa-trash-o" aria-hidden="true" style="font-size: 3rem; color: grey;"></i></a></td>
				<td>
                    {!! Form::open(['route' => ['orders.line_destroy', $item->id], 'method' => 'delete'])!!}
                	{!! Form::submit('Delete' , ['class' => 'btn btn-danger'])!!}
                	{!! Form::close() !!}
				</td>	
			</tr>
			@endforeach
			<tr>
			<td>Total: {{ $order->total }} Euro</td>
			</tr>
			
		</tbody>
		@endif
	</table>
	

	@if(session('cart.total'))
	<p>Total: {{ session('cart.total')}} &euro;</p>
	
	@endif 
	
	{!! Form::open(['route' => ['orders.add_dish', $order->id], 'method' => 'put']) !!}
	
	<div class="form-group">
        {!! Form::Label('title', 'Select Table:') !!}
            <select class="form-control" name="title">
        @foreach($dishes as $dish)
                <option value="{{$dish->id}}">{{$dish->title}}</option>
        @endforeach
            </select>
    </div>

	<div class="form-group">
	<h4>Quantity</h4>
		{!! Form::number('quantity',  null, ['class' => 'form-control', 'placeholder' => 'quantity']) !!}
	</div>

	{!! Form::submit('Add', ['class' => 'btn btn-success']) !!}


	{!! Form::close() !!}
</div>
@endsection