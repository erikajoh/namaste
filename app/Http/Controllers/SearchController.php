<?php namespace App\Http\Controllers;

use App\Models\YogaClass;
use App\Models\Day;
use App\Models\Location;
use App\Models\Rating;
use App\Models\Studio;
use App\Models\Query;
use App\Models\Style;

use Illuminate\Http\Request;

use DB;

class SearchController extends Controller {

  public function search()
  {
    $styles = Style::all();
    $locations = Location::all();

    return view('search', [
      'styles' => $styles,
      'locations' => $locations
    ]);
  }

  public function results(Request $request)
  {
    $keyword = $request->input('keyword');
    $location_id = $request->input('location_id');
    $style_id = $request->input('style_id');

    if ($location_id) {
      $location_query = DB::table('locations')
        ->select('location_name')
        ->where('id', '=', $location_id);
      $location_name = $location_query->get()[0];
    } else $location_name = '';

    if ($style_id) {
      $style_query = DB::table('styles')
        ->select('style_name')
        ->where('id', '=', $style_id);
      $style_name = $style_query->get()[0];
    } else $style_name = '';

    return view('results', [
        'classes' => (new Query())->search([ 'keyword' => $keyword , 'location' => $location_id , 'style' => $style_id ]),
        'searchKeyword' => $keyword,
        'searchLocation' => $location_name,
        'searchStyle' => $style_name
    ]);
  }

} 