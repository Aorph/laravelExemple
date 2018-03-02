<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
  public function books() {
  return $this->belongsToMany('App\Book');
  }
}
