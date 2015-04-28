<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>DVD Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">

  <h1>Results</h1>

  <?php if ($searchTitle != '') : ?>
  <p>
    <?php if (sizeof($dvds) > 0) : ?>
      Showing <strong><?php echo sizeof($dvds) ?></strong> results
    <?php else : ?>
      No results
    <?php endif ?>
    for <strong><?php echo $searchTitle ?></strong> in 
    <?php if ($searchGenre != '') : ?>
      <strong><?php echo $searchGenre->genre_name ?></strong> and 
    <?php else : ?>
      <strong>all genres</strong> and 
    <?php endif ?>
    <?php if ($searchRating != '') : ?>
      <strong><?php echo $searchRating->rating_name ?></strong>.
    <?php else : ?>
      <strong>all ratings</strong>
    <?php endif ?>
    <a href="/dvds/search"> or back to search</a></p>
  <?php else : ?>
  <p>Showing all <strong><?php echo $dvdCount ?></strong> DVDs <a href="/dvds/search"> or looking for something specific?</a></p>
  <?php endif ?>

  <?php if (sizeof($dvds) > 0) : ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Title</th>
          <th>Rating</th>
          <th>Genre</th>
          <th>Label</th>
          <th>Sound</th>
          <th>Format</th>
          <th>Release Date</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dvds as $dvd) : ?>
        <tr>
          <td><?php echo $dvd->title ?> &nbsp; <a href="/dvds/<?php echo $dvd->id ?>">Review</a></td>
          <td><?php echo $dvd->rating ?></td>
          <td><?php echo $dvd->genre ?></td>
          <td><?php echo $dvd->label ?></td>
          <td><?php echo $dvd->sound ?></td>
          <td><?php echo $dvd->format ?></td>
          <td><?php echo $dvd->date ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  <?php endif ?>

</div>

</body>
</html>