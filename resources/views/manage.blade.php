@extends ('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Manage</h1>

	@foreach($errors->all() as $error)
        <p style="background-color:#C01A36;color:white">{{ $error }}</p><br>
    @endforeach
    @if(Session::has('success'))
        <p style="background-color:#008195;color:white">{{ Session::get('success') }}</p><br>
    @endif

	<br>

	<p>Welcome, <b>{{ Auth::user()->username }}</b>!</p>

    <br>

    <div class="form-group">
        <p>What do you want to do?</p>
        <select name="location_id" class="form-control" onchange="window.location.href=this.value">
        <div><option value="" disabled selected>Select...</option></div>
        <div><option value="/classes/add">Add a class</option></div>
        <div><option value="/studios/add">Add a studio</option></div>
        </select>
    </div>
	
</div>

<div class="col-md-1">
</div>

@stop