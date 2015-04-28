<?php namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

  public $timestamps = false;

  public function classes()
  {
    return $this->hasMany('App\Models\YogaClass');
  }

  public function studios()
  {
    return $this->hasMany('App\Models\Studio');
  }

} 