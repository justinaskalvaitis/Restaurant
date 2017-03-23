@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Contact</h1>
			<ul style="width: 50%;">
				<li>{{ $contacts['title']}}</li>
				<li>{{ $contacts['address']}}</li>
				<li>{{ $contacts['email']}}</li>
				<li>{{ $contacts['phone']}}</li>
			</ul>
		</div>

		<div class="col-md-6">
			<table class="pull-right workingHours" border="1">
				<tr>
					<th>Day</th>
					<th>Hours</th>
				</tr>
				<tr>
					<td>Monday</td>
					<td>closed</td>
				</tr>
				<tr>
					<td>Tuesday</td>
					<td>closed</td>
				</tr>
				<tr>
					<td>Wednesday</td>
					<td>8:00 - 20:00</td>
				</tr>
				<tr>
					<td>Thursday</td>
					<td>8:00 - 20:00</td>
				</tr>
				<tr>
					<td>Friday</td>
					<td>8:00 - 20:00</td>
				</tr>
				<tr>
					<td>Saturday</td>
					<td>8:00 - 20:00</td>
				</tr>
				<tr>
					<td>Sunday</td>
					<td>8:00 - 20:00</td>
				</tr>
			</table>
		</div>
	</div>
</div>
{!! $contacts['map'] !!}


@endsection