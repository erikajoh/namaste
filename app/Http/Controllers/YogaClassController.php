<?php namespace App\Http\Controllers;

use App\Models\YogaClass;
use App\Models\Day;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Studio;
use App\Models\Query;
use App\Models\Style;

use Auth;

use Illuminate\Http\Request;

use DB;

class YogaClassController extends Controller {

  public function show(Request $request, $id)
  {
    $class_query = DB::table('yoga_classes')
      ->select([
        DB::raw('name as name'),
        DB::raw('location_name as location'),
        DB::raw('style_name as style'),
        DB::raw('studio_name as studio'),
        DB::raw('yoga_classes.rating as rating'),
        DB::raw('day as day'),
        DB::raw('time as time'),
        DB::raw('period as period'),
        DB::raw('img_url as image'),
        DB::raw('website as website'),
        DB::raw('address as address'),
        DB::raw('studios.rating as studio_rating'),
        DB::raw('yoga_classes.num_ratings as num_ratings'),
        DB::raw('studios.num_ratings as studio_num_ratings'),
        DB::raw('studio_id as studio_id')
      ])
      ->join('locations', 'yoga_classes.location_id', '=', 'locations.id')
      ->join('styles', 'yoga_classes.style_id', '=', 'styles.id')
      ->join('studios', 'yoga_classes.studio_id', '=', 'studios.id')
      ->where('yoga_classes.id', '=', $id);
    $class_array = $class_query->get();
    if (sizeof($class_array) > 0) {
      $class = $class_array[0];
    } else {
      return redirect('/classes/');
    }

    return view('class_details', [
        'class' => $class,
        'class_id' => $id
    ]);
  }

  public function rate(Request $request)
  {
    $id = $request->input('class_id');
    for ($i = 1; $i <= 5; $i++) {
      if ($request->input(strval($i)) === 'on') $rating = $i;
    }

    $class = YogaClass::find($id);
    $old_rating_aggr = $class->rating * $class->num_ratings;
    $new_rating_aggr = $old_rating_aggr + $rating;
    $new_num_ratings = $class->num_ratings + 1;
    $class->rating = $new_rating_aggr / $new_num_ratings;
    $class->num_ratings = $new_num_ratings;
    $class->save();
    return redirect('/classes/id/' . $id)->with('success', 'Rating successfully saved!');
  }

  public function add(Request $request)
  {
    if (Auth::check()) {
      return view('add_class', [
        'studios' => Studio::all(),
        'locations' => Location::all(),
        'styles' => Style::all()
      ]);
    }
    return redirect('/');
  }

  public function save(Request $request)
  {
    if (Auth::check()) {

      $validation = \Validator::make($request->all(), [
        'name' => 'required',
        'studio_id' => 'required',
        'style_id' => 'required',
        'day' => 'required',
        'time' => 'required|date_format:H:i',
        'period' => 'required'
      ]);

      if ($validation->passes()) {
        $studio = Studio::find($request->input('studio_id'));
        $location_id = $studio->location_id;
        $yogaClass = new YogaClass();
        $yogaClass->name = $request->input('name');
        $yogaClass->studio_id = $request->input('studio_id');
        $yogaClass->location_id = $location_id;
        $yogaClass->style_id = $request->input('style_id');
        $yogaClass->day = $request->input('day');
        $yogaClass->time = $request->input('time');
        $yogaClass->period = $request->input('period');
        $yogaClass->save();
        return redirect('classes/add')
        ->with('success', 'Class successfully saved!');
      } else {
        return redirect('classes/add')
        ->withInput()
        ->withErrors($validation);
      }

    }
    return redirect('/');
  }

} 