<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etiqueta;
use App\Familia;
use App\FamiliaEtiqueta;
use App\Producto;

class SeccionProductoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de los productos
        $familias = Familia::all();
        return view('productos.home', ['familias' => $familias]);
    }

    public function show($id){
        $familias  = Familia::all();
        $productos = Producto::where('familia_id', $id)->with('galerias')->get();
        $familia   = Familia::find($id);
        return view('productos.show', ['familias' => $familias, 'productos' => $productos, 'familia' => $familia]);
    }

    public function showProducto($id){
        $producto         = Producto::find($id);
        $familias         = Familia::all();
        $etiquetas        = Etiqueta::with('familia_etiqueta')->where('producto_id', $id)->get();
        $etiquetasF       = Etiqueta::select('familia_etiqueta_id')->where('producto_id', $id)->distinct()->get();
        $familiaEtiquetas = FamiliaEtiqueta::whereIn('id', $etiquetasF)->get();
        $tag=$familiaEtiquetas->first();

        return view('productos.showProducto', ['producto' => $producto, 'familias' => $familias, 'familiaEtiquetas' => $familiaEtiquetas, 'etiquetas' => $etiquetas, 'etiquetasF' => $etiquetasF, 'tag' => $tag ]);
    }

    public function ShowEtiquetas($id){
        dd($id);
        $producto         = Producto::find($id);
        $familias         = Familia::all();
        $familiaEtiquetas = FamiliaEtiqueta::all();
        $tag = FamiliaEtiqueta::find($id)->etiquetas()->get();
        dd($tag);

        return view('productos.showProducto', ['producto' => $producto, 'familias' => $familias, 'familiaEtiquetas' => $familiaEtiquetas,'tag' => $tag ]);
    }
}
