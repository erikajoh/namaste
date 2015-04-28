<?php namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model {

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