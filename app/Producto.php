<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
	public function familia()
	{
		return $this->belongsTo('App\Familia');
	}


    // 
	public function galerias()
	{
		return $this->hasMany('App\Galeria');
	}

    // 
	public function etiquetas()
	{
		return $this->hasMany('App\Etiqueta');
	}

      // Buscador
	public function scopeBuscador($query) 
	{
		return $query->where('nombre', $nombre);
	}
}
