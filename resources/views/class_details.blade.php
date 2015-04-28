@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>{{ $class->name }}</h1>
	<br>
	<table class="table">
		<tr>
			<td><b>Rating</b></td>
			<td>
				@for ($i = 1; $i <= 5; $i++)
			      @if ($i <= round($class->rating))
			        &#9733;
			      @else
			        &#9734;
			      @endif
			    @endfor
			    &nbsp;
		        ({{ $class->num_ratings }} @if ($class->num_ratings != 1) ratings) @else rating) @endif
			</td>
		</tr>
		<tr>
			<td><b>Location</b></td>
			<td>{{ $class->location }}</td>
		</tr>
		<tr>
			<td><b>Style</b></td>
			<td>{{ $class->style }}</td>
		</tr>
		<tr>
			<td><b>Studio</b></td>
			<td><a href="/studios/id/{{ $class->studio_id }}">{{ $class->studio }}</a></td>
		</tr>
		<tr>
			<td><b>Day</b></td>
			<td>{{ $class->day }}</td>
		</tr>
		<tr>
			<td><b>Time</b></td>
			<td>{{ $class->time }} {{ $class->period }}</td>
		</tr>
	</table>

	<br>

	<h1>Rate it</h1>
	<h2>
		<div class="stars">
		  <form action="" method="POST">
		  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<input type="hidden" name="class_id" value="{{ $class_id }}">
		    <input class="star star-5" id="star-5" type="radio" name="5" onchange="this.form.submit()"/>
		    <label class="star star-5" for="star-5"></label>
		    <input class="star star-4" id="star-4" type="radio" name="4" onchange="this.form.submit()"/>
		    <label class="star star-4" for="star-4"></label>
		    <input class="star star-3" id="star-3" type="radio" name="3" onchange="this.form.submit()"/>
		    <label class="star star-3" for="star-3"></label>
		    <input class="star star-2" id="star-2" type="radio" name="2" onchange="this.form.submit()"/>
		    <label class="star star-2" for="star-2"></label>
		    <input class="star star-1" id="star-1" type="radio" name="1" onchange="this.form.submit()"/>
		    <label class="star star-1" for="star-1"></label>
		  </form>
		</div>
		@if(Session::has('success'))
			<p style="color:#008195;">{{ Session::get('success') }}</p>
		@endif
		<br><br>
	</h2>
</div>

<div class="col-md-1">
</div>

<div class="col-md-3">
	<h1>STUDIO</h1>
	<p><a href="/studios/id/{{ $class->studio_id }}">{{ $class->studio }}</a></p>
	<p>
		@for ($i = 1; $i <= 5; $i++)
	      @if ($i <= round($class->studio_rating))
	        &#9733;
	      @else
	        &#9734;
	      @endif
	    @endfor
	    &nbsp;
        ({{ $class->studio_num_ratings }} @if ($class->studio_num_ratings != 1) ratings) @else rating) @endif
	</p>
	<p>{{ $class->address }}</p>
	<p><a href="{{ $class->website }}">{{ $class->website }}</a></p>
	<img src="{{ $class->image }}" width="100%">
</div>

<div class="col-md-1">
</div>

<br><br>

@stop