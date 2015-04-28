<?php namespace App\Http\Controllers;

use App\Models\YogaClass;
use App\Models\Day;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Studio;
use App\Models\Query;
use App\Models\Style;

use Auth;
use Cache;

use Illuminate\Http\Request;
use \Twitter;

use DB;

class StudioController extends Controller {

  public function show(Request $request, $id)
  {
    $studio_query = DB::table('studios')
      ->select([
        DB::raw('location_name as location'),
        DB::raw('studio_name as name'),
        DB::raw('img_url as image'),
        DB::raw('website as website'),
        DB::raw('address as address'),
        DB::raw('studios.rating as rating'),
        DB::raw('studios.num_ratings as num_ratings')
      ])
      ->join('locations', 'studios.location_id', '=', 'locations.id')
      ->where('studios.id', '=', $id);
    $studio_array = $studio_query->get();
    if (sizeof($studio_array) > 0) {
      $studio = $studio_array[0];
    } else {
      return redirect('/');
    }

    // CACHING + API CALL TO TWITTER
    if (Cache::has($id))
    {
      $tweets = Cache::get($id);
    } else {
      $trimmed_studio_name = strtolower($studio->name);
      $trimmed_studio_name = preg_replace('/[[:punct:]]/', '', $trimmed_studio_name);
      $trimmed_studio_name = trim($trimmed_studio_name, ' ');
      $tweets = Twitter::getSearch(array('q' => $trimmed_studio_name, 'count' => 100, 'format' => 'array'));
      $tweets = $tweets['statuses'];
      Cache::put($id, $tweets, 60);
    }

    return view('studio_details', [
        'studio' => $studio,
        'studio_id' => $id,
        'tweets' => $tweets,
        'classes' => (new Query())->searchByStudio([ 'studio' => $id ])
    ]);
  }

  public function showByLocation($location_name)
  {
    if ($location_name === 'all') {
      $studios = DB::table('studios')
      ->join('locations', 'studios.location_id', '=', 'locations.id')
      ->select('studios.id', 'studio_name', 'address', 'website', 'studios.rating', 'studios.num_ratings', 'locations.location_name')
      ->get();
    } else {
      $location = Location::where('location_name', '=', $location_name)->first();
      if (!$location) {
        return redirect('/');
      }
      $studios = $location->studios()
      ->join('locations', 'studios.location_id', '=', 'locations.id')
      ->select('studios.id', 'studio_name', 'address', 'website', 'studios.rating', 'studios.num_ratings', 'locations.location_name')
      ->get();
    }

    return view('studios', [
      'location_name' => $location_name,
      'studios' => $studios
    ]);
  }

  public function rate(Request $request)
  {
    $id = $request->input('studio_id');
    for ($i = 1; $i <= 5; $i++) {
      if ($request->input(strval($i)) === 'on') $rating = $i;
    }

    $studio = Studio::find($id);
    $old_rating_aggr = $studio->rating * $studio->num_ratings;
    $new_rating_aggr = $old_rating_aggr + $rating;
    $new_num_ratings = $studio->num_ratings + 1;
    $studio->rating = $new_rating_aggr / $new_num_ratings;
    $studio->num_ratings = $new_num_ratings;
    $studio->save();

    return redirect('/studios/id/' . $id)->with('success', 'Rating successfully saved!');
  }

  public function add(Request $request)
  {
    if (Auth::check()) {
      return view('add_studio', [
        'locations' => Location::all()
      ]);
    }
    return redirect('/');
  }

  public function save(Request $request)
  {
    if (Auth::check()) {

      $validation = \Validator::make($request->all(), [
        'studio_name' => 'required',
        'location_id' => 'required',
        'address' => 'required',
        'website' => 'required|url',
        'img_url' => 'required|url'
      ]);

      if ($validation->passes()) {
        $studio = new Studio();
        $studio->studio_name = $request->input('studio_name');
        $studio->location_id = $request->input('location_id');
        $studio->address = $request->input('address');
        $studio->website = $request->input('website');
        $studio->img_url = $request->input('img_url');
        $studio->save();
        return redirect('studios/add')
        ->with('success', 'Studio successfully saved!');
      } else {
        return redirect('studios/add')
        ->withInput()
        ->withErrors($validation);
      }

    }
    return redirect('/');
  }

} 