<?php 
	require_once 'vendor/autoload.php';
	use App\Models\Dvd;
	// use \Symfony\Component\HTTPFoundation\Session\Session;
	// $session = new Session();
	// $session->start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>DVD Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<?php

	$dvd_query = new Dvd();
	$genres = $dvd_query->getGenres();
	$ratings = $dvd_query->getRatings();

?>

<div class="container">

	<h1>Search</h1>

	<p>Search for a DVD <a href="/dvds">or show them all</a></p>

	<br>

	<form action="/dvds" method="GET">
		<div class="form-group">
			Title:
			<input type="text" name="title" class="form-control">
		</div>
		<div class="form-group">
			Genre:
			<select name="genre" class="form-control">
			<div><option value="">All</option></div>
			<?php foreach($genres as $genre): ?>
			<div><?php echo '<option value="' . $genre->id . '">' . $genre->genre_name . '</option>' ?></div>
			<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			Rating:
			<select name="rating" class="form-control">
			<div><option value="">All</option></div>
			<?php foreach($ratings as $rating): ?>
			<div><?php echo '<option value="' . $rating->id . '">' . $rating->rating_name . '</option>' ?></div>
			<?php endforeach; ?>
			</select>
		</div>
		<br>
		<button type="submit" class="btn btn-default">search it!</button>
	</form>
</div>

</body>
</html>