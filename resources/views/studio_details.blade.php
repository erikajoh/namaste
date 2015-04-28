@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>{{ $studio->name }}</h1>
	<br>
	<table class="table">
		<tr>
			<td><b>Rating</b></td>
			<td>
				@for ($i = 1; $i <= 5; $i++)
			      @if ($i <= round($studio->rating))
			        &#9733;
			      @else
			        &#9734;
			      @endif
			    @endfor
			    &nbsp;
		        ({{ $studio->num_ratings }} @if ($studio->num_ratings != 1) ratings) @else rating) @endif
			</td>
		</tr>
		<tr>
			<td><b>Address</b></td>
			<td>{{ $studio->address }}</td>
		</tr>
		<tr>
			<td><b>Website</b></td>
			<td><a href="{{ $studio->website }}">{{ $studio->website }}</a></td>
		</tr>
	</table>

	<img src="{{ $studio->image }}" width="100%">

	<br><br>

	<h1>Rate it</h1>
	<h2>
		<div class="stars">
		  <form action="" method="POST">
		  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		  	<input type="hidden" name="studio_id" value="{{ $studio_id }}">
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
	</h2>

	<br><br>

	<h1>Classes</h1>

	@if (sizeof($classes) > 0)
    	Showing <strong>{{ sizeof($classes) }}</strong> yoga classes
  	@else
    	No results
    @endif

    <br><br>

	@if (sizeof($classes) > 0)
	    <table class="table table-striped">
	      <thead>
	        <tr>
	          <th>Name</th>
	          <th>Style</th>
	          <th>Day</th>
	          <th>Time</th>
	          <th>Rating</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach ($classes as $class)
	        <tr>
	          <td><a href="/classes/id/{{ $class->id }}">{{ $class->name }}</a></td>
	          <td>{{ $class->style }}</td>
	          <td>{{ $class->day }}</td>
	          <td>{{ $class->time }} {{ $class->period }}</td>
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
	        @endforeach
	      </tbody>
	    </table>
	  @endif

</div>

<div class="col-md-1">
</div>

<div class="col-md-3">
	<h1>Tweets</h1>
	@if (sizeof($tweets) > 0)
		@foreach ($tweets as $tweet)
			<a href="http://twitter.com/statuses/{{ $tweet['id_str'] }}">{{ $tweet['text'] }}</a>
			<br><br>
		@endforeach
	@else
		No tweets
	@endif
</div>

<div class="col-md-1">
</div>

<br><br>

@stop