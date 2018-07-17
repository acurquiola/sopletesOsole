<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;

class SeccionServicioController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de servicios
        $servicios = Servicio::all();
        return view('servicios.home', ['servicios' => $servicios]);
    }

}
