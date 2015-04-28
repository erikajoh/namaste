@extends('layout')

@section('content')

<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>

<style>
	body {
		background: #C01A36;
		color: #fff;
	}

	.welcome {
		text-align: center;
		display: table;
		vertical-align: middle;
		margin: 20vh auto;
	}

	.quote {
		margin-bottom: 80px;
		color: #fff;
	}

	a, a:link, a:hover, a:visited, a:active {
		color: #fff;
	}

	.nav {
		background: #fff;
		color: #008195;
	}

	.nav a {
		color: #008195;
	}

	.title {
		font-size: 68px;
		margin-bottom: 20px;
		font-family: 'Shadows Into Light';
		color: white;
	}

</style>

<div class="welcome">
	<div class="title">
		NAMASTE
	</div>

	<div class="quote">Bringing you the west coast's best yoga.</div>

	<br><br>
	
	<div class="form-group">
		<p>Choose a location to get started:</p>
		<select name="location_id" class="form-control" onchange="window.location.href=this.value">
		<div><option value="" disabled selected>Select...</option></div>
		<div><option value="/studios/location/all">All</option></div>
		@foreach($locations as $location)
		<div><option value="/studios/location/{{ $location->location_name }}"> {{ $location->location_name }} </option></div>
		@endforeach
		</select>
	</div>
	<br>
	<a href="/classes/search">advanced search</a>
</div>

@stop
