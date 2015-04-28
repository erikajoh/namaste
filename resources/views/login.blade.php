@extends('layout')

@section('content')

<div class="col-md-1">
</div>

<div class="col-md-6">
    <h1>Login</h1>

    <br>
    
    @foreach($errors->all() as $error)
        <p style="background-color:#C01A36;color:white">{{ $error }}</p><br>
    @endforeach
    
    <form method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Login" class="btn btn-default">
    </form>
</div>

<div class="col-md-1">
</div>

@endsection
