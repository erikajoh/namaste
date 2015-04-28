<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Namaste</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
    <style>

	    body {
	    	display: block;
			font-family: 'Avenir';
			background-color: #fff;
			color: #008195;
		}

		body::after {
			background-image: url(https://clearyoga.files.wordpress.com/2011/04/namaste1w.jpg);
			background-size: 100% auto;
			opacity: 0.2;
			content: "";
			position: fixed;
			top: 0;
			left: -180px;
			right: -180px;
			bottom: 0;
			z-index: -1;
			margin: 0;
		}

		h1, h2, h3, h4, h5 {
			font-family: 'Avenir Next';
			text-transform: uppercase;
			font-weight: 400;
		}

		strong, b, th, label {
			font-family: 'Avenir Next';
			font-weight: 500;
		}

		a, a:link, a:hover, a:visited, a:active {
			color: #C01A36;
		}

		.btn {
			color: #C01A36;
		}

		.nav {
			padding-top: 10px;
			width: 100%;
			background: #C01A36;
			color: white;
		}

		.nav a {
			color: #fff;
			padding: 5px 10px;
		}

		.right {
			float: right;
			margin-right: 40px;
		}

		.left {
			float: left;
			margin-left: 40px;
		}

		p {
			font-family: 'Avenir';
			font-size: 14px;
		}

		.container {
			width: 100%;
			margin-top: 20px;
		}

		div.stars {
		  width: 220px;
		  display: inline-block;
		}

		input.star { display: none; }

		label.star {
		  float: right;
		  padding-right: 20px;
		  font-size: 24px;
		  color: #444;
		  transition: all .2s;
		  cursor: pointer;
		}

		input.star:checked ~ label.star:before {
		  content: '\2605';
		  transition: all .25s;
		}

		label.star:hover { transform: scale(1.3); }

		label.star:before {
		  content: '\2606';
		}

    </style>
</head>
<body>

<div class="nav">
	<span class="left">
		<p>
			<b>NAMASTE</b>
			@if (Auth::check())
				&nbsp;&nbsp;&nbsp;&nbsp; &#10163; logged in as {{ Auth::user()->username }}
			@endif
		</p>
	</span>
	<span class="right">
		<p>
			<a href="/">home</a> &nbsp;
			<a href="/classes/search">search</a> &nbsp;
			<a href="/about">about</a> &nbsp;
			@if (!Auth::check())
				<a href="/signup">signup</a> &nbsp;
				<a href="/login">login</a>
			@else
				<a href="/manage">manage</a> &nbsp;
				<a href="/profile">profile</a> &nbsp;
				<a href="/logout">logout</a>
			@endif
		</p>
	</span>
</div>

<div class="container">
  @yield('content')
</div>

</body>
</html>