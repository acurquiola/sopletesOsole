<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // 
	public function sliders()
    {
        return $this->hasMany('App\Slider');
    }
}
