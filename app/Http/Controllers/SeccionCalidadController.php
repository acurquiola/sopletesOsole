<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calidad;
use App\CalidadDescarga;

class SeccionCalidadController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de la empresa
        $descargas = CalidadDescarga::all();
        $calidad = Calidad::first();
        return view('calidad.home', ['descargas' => $descargas, 'calidad' => $calidad]);
    }
}
