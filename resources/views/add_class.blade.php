@extends ('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Add Class</h1>

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
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <h3>Studio:</h3>
            <select name="studio_id" class="form-control">
            @foreach($studios as $studio)
            <div><option value="{{ $studio->id }}"> {{ $studio->studio_name }} </option></div>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <h3>Style:</h3>
            <select name="style_id" class="form-control">
            @foreach($styles as $style)
            <div><option value=" {{ $style->id }} "> {{ $style->style_name }} </option></div>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <h3>Day:</h3>
            <select name="day" class="form-control">
            <div><option value="Sunday">Sunday</option></div>
            <div><option value="Monday">Monday</option></div>
            <div><option value="Tuesday">Tuesday</option></div>
            <div><option value="Wednesday">Wednesday</option></div>
            <div><option value="Thursday">Thursday</option></div>
            <div><option value="Friday">Friday</option></div>
            <div><option value="Saturday">Saturday</option></div>
            </select>
        </div>
        <div class="form-group">
            <h3>Time (hh:mm): </h3>
            <input type="text" name="time" class="form-control">
        </div>
        <div class="form-group">
            <h3>Period:</h3>
            <select name="period" class="form-control">
            <div><option value="AM">AM</option></div>
            <div><option value="PM">PM</option></div>
            </select>
        </div>
        <br><br>
        <button type="submit" class="btn btn-default"><h5>add class</h5></button>
    </form>

    <br><br>
	
</div>

<div class="col-md-1">
</div>

@stop