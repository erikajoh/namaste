@extends ('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Add Studio</h1>

	<br>

	<p>Welcome, <b>{{ Auth::user()->username }}</b>!</p>

    <br>

    @foreach($errors->all() as $error)
        <p style="background-color:#C01A36;color:white">{{ $error }}</p><br>
    @endforeach
    @if(Session::has('success'))
        <p style="background-color:#008195;color:white">{{ Session::get('success') }}</p><br>
    @endif

    <form action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <h3>Name:</h3>
            <input type="text" name="studio_name" class="form-control">
        </div>
        <div class="form-group">
            <h3>Location:</h3>
            <select name="location_id" class="form-control">
            @foreach($locations as $location)
            <div><option value="{{ $location->id }}"> {{ $location->location_name }} </option></div>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <h3>Address:</h3>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <h3>Website:</h3>
            <input type="text" name="website" class="form-control">
        </div>
        <div class="form-group">
            <h3>Image Link:</h3>
            <input type="text" name="img_url" class="form-control">
        </div>
        <br><br>
        <button type="submit" class="btn btn-default"><h5>add studio</h5></button>
    </form>

    <br><br>
	
</div>

<div class="col-md-1">
</div>

@stop