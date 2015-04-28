<?php namespace App\Models;

use DB;
use Validator;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model {

  public static function validate($input)
  {
    return Validator::make($input, [
      'studio_name' => 'required'
    ]);
  }

  public $timestamps = false;

  public function classes()
  {
    return $this->hasMany('App\Models\YogaClass');
  }

  public function locations()
  {
    return $this->hasMany('App\Models\Location');
  }

} 