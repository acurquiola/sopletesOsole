<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    //
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    //
    public function familia_etiqueta()
    {
        return $this->belongsTo('App\FamiliaEtiqueta');
    }
}
