@extends ('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
	<h1>Profile</h1>

	<br>

	<p>Welcome, <b>{{ Auth::user()->username }}</b>!</p>

    <br>

    @foreach($errors->all() as $error)
        <p style="background-color:#C01A36;color:white">{{ $error }}</p><br>
    @endforeach
    @if(Session::has('success'))
        <p style="background-color:#008195;color:white">{{ Session::get('success') }}</p><br>
    @endif

	<form action="/profile/change_username" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="username">New Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <input type="submit" value="Change Username" class="btn btn-default">
    </form>

    <br><br>
    
    <form action="/profile/change_password" method="post">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Change Password" class="btn btn-default">
    </form>

	<br><br>

	<form action="/profile/delete" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="username">Delete Account</label>
            <br>
            Warning: this will permanently delete your account!
            You will be logged out immediately and must sign up again to access admin features.
            Please type your username below to confirm.
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <input type="submit" value="Delete Account" class="btn btn-default">
    </form>
	
</div>

<div class="col-md-1">
</div>

@stop