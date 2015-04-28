<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>DVD Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body style="margin: 20px;">

<div class="container">

	<h1>Reviews</h1>

	<p>Review <strong><?php echo $dvd->title ?></strong> <a href="/dvds">or show all DVDs</a></p>

	<?php foreach ($errors->all() as $errorMessage) : ?>
		<p style="color:red;"><?php echo $errorMessage ?></p>
	<?php endforeach ?>

	<br>

	<?php if (Session::has('success')) : ?>
		<p><?php echo Session::get('success') ?></p>
	<?php endif ?>

	<form method="post" action="/dvds/reviews">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		<input type="hidden" name="dvd_id" value="<?php echo $dvd_id ?>">
		<div class="form-group">
			<label>Title</label>
			<input name="title" class="form-control" value="<?php echo Request::old('title') ?>">
		</div>
		<div class="form-group">
			<label>Rating</label>
			<select name="rating" class="form-control">
				<?php for ($x = 1; $x <= 10; $x++) : ?>
					<?php if ($x == Request::old('rating')) : ?>
						<option value="<?php echo $x ?>" selected="selected">
							<?php echo $x ?>
						</option>
					<?php else : ?>
						<option value="<?php echo $x ?>">
							<?php echo $x ?>
						</option>
					<?php endif ?>
				<?php endfor ?>
			</select>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea name="description" class="form-control"><?php echo Request::old('description') ?></textarea>
		</div>
		<br>
		<button type="submit" class="btn btn-default">review it</button>
	</form>
	<br><hr><br>
	<p>
		<?php if (sizeof($reviews) > 0) : ?>
			Showing <strong><?php echo sizeof($reviews) ?></strong> reviews
		<?php else : ?>
			No reviews
		<?php endif ?>
		for <strong><?php echo $dvd->title ?></strong>
	</p>
	<?php if (sizeof($reviews) > 0) : ?>
		<table class="table table-striped">
	      <thead>
	        <tr>
	          <th>Title</th>
	          <th>Rating</th>
	          <th>Description</th>
	        </tr>
	      </thead>
	      <tbody>
	        <?php foreach ($reviews as $review) : ?>
	        <tr>
	          <td><?php echo $review->title ?></td>
	          <td><?php echo $review->rating ?></td>
	          <td><?php echo $review->description ?></td>
	        </tr>
	        <?php endforeach ?>
	      </tbody>
    	</table>
	<?php endif ?>
</div>

</body>
</html>