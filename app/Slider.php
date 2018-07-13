<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
