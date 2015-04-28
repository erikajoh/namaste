<?php namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Day extends Model {

  public $timestamps = false;

  public function classes()
  {
    return $this->hasMany('App\Models\YogaClass');
  }

} 