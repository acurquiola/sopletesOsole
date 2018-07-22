<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;

class SeccionPrecioController extends Controller
{
    public function __construct(){

        $this->middleware(['auth']);

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de la empresa
        $precios = Precio::all();
        return view('precios.home', ['precios' => $precios]);
    }
}
