<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Descarga;

class SeccionDescargaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de la empresa
        $descargas = Descarga::all();
        return view('descargas.home', ['descargas' => $descargas]);
    }
}
