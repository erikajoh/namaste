<?php namespace App\Http\Controllers;

use App\Models\YogaClass;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use DB;

class LoadingController extends Controller {

  public function eagerLoading()
  {
    $classes = YogaClass::with('location', 'studio', 'style', 'day', 'time', 'period', 'rating', 'num_ratings')->get();
    var_dump($classes->toArray());
  }

} 