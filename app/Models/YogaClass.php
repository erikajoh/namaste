<?php namespace App\Models;

use DB;
use Validator;

use Illuminate\Database\Eloquent\Model;

class YogaClass extends Model {

  public static function validate($input)
  {
    return Validator::make($input, [
      'name' => 'required'
    ]);
  }

  public $timestamps = false;

  public function day()
  {
    return $this->belongsTo('App\Models\Day');
  }

  public function location()
  {
    return $this->belongsTo('App\Models\Location');
  }

  public function studio()
  {
    return $this->belongsTo('App\Models\Studio');
  }

  public function rating()
  {
    return $this->belongsTo('App\Models\Rating');
  }

  public function style()
  {
    return $this->belongsTo('App\Models\Style');
  }

} 