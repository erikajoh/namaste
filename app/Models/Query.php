<?php namespace App\Models;

use DB;

class Query {

  public $timestamps = false;

  public function search(array $searchParams)
  {
    $query = \DB::table('yoga_classes', 'studios')
      ->select([
        DB::raw('yoga_classes.id as id'),
        DB::raw('name as name'),
        DB::raw('style_name as style'),
        DB::raw('location_name as location'),
        DB::raw('studio_name as studio'),
        DB::raw('studio_id as studio_id'),
        DB::raw('yoga_classes.rating as rating'),
        DB::raw('day as day'),
        DB::raw('time as time'),
        DB::raw('period as period'),
        DB::raw('yoga_classes.num_ratings as num_ratings')
      ])
      ->join('styles', 'yoga_classes.style_id', '=', 'styles.id')
      ->join('locations', 'yoga_classes.location_id', '=', 'locations.id')
      ->join('studios', 'yoga_classes.studio_id', '=', 'studios.id')
      ->where('name', 'LIKE', "%" . $searchParams['keyword'] . "%");

      if($searchParams['location'])
        $query->where('yoga_classes.location_id', '=', $searchParams['location']);

      if($searchParams['style'])
        $query->where('yoga_classes.style_id', '=', $searchParams['style']);

      $query->orderBy('name', 'asc');

    return $query->get();
  }

  public function searchByStudio(array $searchParams)
  {
    $query = \DB::table('yoga_classes', 'studios')
      ->select([
        DB::raw('yoga_classes.id as id'),
        DB::raw('name as name'),
        DB::raw('style_name as style'),
        DB::raw('location_name as location'),
        DB::raw('studio_name as studio'),
        DB::raw('yoga_classes.rating as rating'),
        DB::raw('day as day'),
        DB::raw('time as time'),
        DB::raw('period as period'),
        DB::raw('yoga_classes.num_ratings as num_ratings')
      ])
      ->join('styles', 'yoga_classes.style_id', '=', 'styles.id')
      ->join('locations', 'yoga_classes.location_id', '=', 'locations.id')
      ->join('studios', 'yoga_classes.studio_id', '=', 'studios.id');

      if($searchParams['studio'])
        $query->where('yoga_classes.studio_id', '=', $searchParams['studio']);

      $query->orderBy('name', 'asc');

    return $query->get();
  }

    public function getGenres()
  {
    $query = \DB::table('genres')
      ->select('genre_name', 'id')
      ->orderBy('genre_name', 'asc');

    return $query->get();
  }

  public function getRatings()
  {
    $query = \DB::table('ratings')
      ->select('rating_name', 'id')
      ->orderBy('rating_name', 'asc');

    return $query->get();
  }

} 