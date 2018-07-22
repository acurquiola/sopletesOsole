<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Destacado;
use App\Producto;
use App\Section;
use App\Slider;
use App\Text;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Slider
        $section = Section::where('nombre', 'Home')->first();
        $sliders = Slider::where('section_id', $section->id)->orderBy('orden')->get();

        //Productos Destacados
        $destacados        = Destacado::all();
        $destacadosNombres = Destacado::pluck('titulo');
        $productos         = Producto::whereIn('nombre', $destacadosNombres)->get();

        //Informacion 
        $informacion = Text::first();

        return view('home.home', ['sliders' => $sliders, 'destacados' => $destacados, 'informacion' => $informacion, 'productos' => $productos, ]);
    }

    public function buscador(Request $request)
    {
        $busqueda  = $request->nombre;
        $resultado = Producto::where('nombre', 'like', '%'.$busqueda.'%')->get();

        return view('home.busqueda', ['resultado' => $resultado]);
    }
}
