@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Search</h1>
	<p>Search for yoga classes <a href="/">or go home</a></p>
	<br>
	<form action="/classes" method="GET">
		<div class="form-group">
			<h3>Keyword:</h3>
			<input type="text" name="keyword" class="form-control">
		</div>
		<br>
		<div class="form-group">
			<h3>Location:</h3>
			<select name="location_id" class="form-control">
			<div><option value="">All</option></div>
			@foreach($locations as $location)
			<div><option value="{{ $location->id }}"> {{ $location->location_name }} </option></div>
			@endforeach
			</select>
		</div>
		<br>
		<div class="form-group">
			<h3>Styles:</h3>
			<select name="style_id" class="form-control">
			<div><option value="">All</option></div>
			@foreach ($styles as $style)
			<div><option value="{{ $style->id }}"> {{ $style->style_name }} </option></div>
			@endforeach
			</select>
		</div>
		<br><br>
		<button type="submit" class="btn btn-default"><h5>search for classes</h5></button>
		&nbsp; or &nbsp;
		<button type="button" onclick="window.location.href='/studios'" class="btn btn-default"><h5>show all studios</h5></button>
	</form>
</div>

<div class="col-md-1">
</div>

<div class="col-md-3">
    <h1>Locations</h1>
	<p>Show studios by location</a></p>
	<br>
	<p><a href="/studios/location/all">All</a></p>
	@foreach($locations as $location)
		<p><a href="/studios/location/{{ $location->location_name }}">{{ $location->location_name }}</a></p>
	@endforeach
</div>

<div class="col-md-1">
</div>

<br><br>

@stop