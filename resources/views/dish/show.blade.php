@extends('layouts.app')

@section('content')

<h2>{{ $dish->title }}</h2>

<img src="{{ $dishes->photo }}" class="img-responsive" width="200px" >
<p>{{$dish->description}}</p>
<ul>
	<li>{{$dish->price}} eur</li>
	<li>{{$dish->quantity}} eur</li>
</ul>

@endsection