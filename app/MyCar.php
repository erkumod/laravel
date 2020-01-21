<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyCar extends Model
{
  protected $primaryKey = "id";
  protected $guarded = [ 'id' ];

  protected $hidden = [];
    public function selectedOptions()
  {
      return $this->belongsToMany('App\Models\GlobalOption','global_question_option','question_id','option_id')->wherePivot('deleted_at','=',null);
  }
}
