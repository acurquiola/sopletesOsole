<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamiliaEtiqueta extends Model
{
    // 
	public function etiquetas()
    {
        return $this->hasMany('App\Etiqueta');
    }
}
