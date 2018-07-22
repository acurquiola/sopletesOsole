<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precio;
use App\Http\Requests\PrecioRequest;

class PrecioController extends Controller
{

    public function __construct(){

        $this->middleware(['auth', 'admin']);

    }
    
	public function index()
	{

		$precios = Precio::all();

		return view('admin.precios.index', ['precios' => $precios]);
	}


	public function create()
	{

		return view('admin.precios.create');
	}

	public function store(PrecioRequest $request)
	{

		$validated = $request->validated();

		$precios = Precio::all();
		$precios = $precios->last();

		if(!$precios)
			$num = 1;
		else
			$num = $precios->id+1;

        //Almacenamiento del PDF
		$ruta       = 'precios';
		$path       = \Storage::putFileAs($ruta, $request->file('file'),'precios'.$num.'.'.$request->file('file')->getClientOriginalExtension());
		$rutaNombre = 'precios'.$num.'.'.$request->file('file')->getClientOriginalExtension();

		$precio         = new Precio;
		$precio->file   = $rutaNombre;
		$precio->titulo = $request->titulo;

		if($precio->save()){
					return redirect()->back()->with('alert', "Registro almacenando exitósamente" );
				}else{
							return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );}
	}

	public function eliminar($id)
	{
        $precio  = Precio::find($id);

        $path     = $precio->file;
        if(\Storage::delete('precios/'.$path)){
            if($precio->delete()){
                return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
            }else{
                return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
            }
        }else{
            return redirect()->back()->with('errors', "Archivo correspondiente no existe" );
        }   
	}
}
