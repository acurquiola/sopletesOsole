<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
class SeccionEmpresaController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de la empresa
        $empresa = Empresa::first();
        return view('empresa.home', ['empresa' => $empresa]);
    }
}
