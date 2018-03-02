<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  public function genre() {
    return $this->belongsTo('App\Genre');
  }
  public function translations() {
    return $this->belongsToMany('App\Translation');
  }
}
