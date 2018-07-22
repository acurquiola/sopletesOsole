<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DescargaRequest;
use Illuminate\Support\Facades\Storage;

use Image;
use App\Descarga;

class DescargaController extends Controller
{

	public function __construct(){

		$this->middleware(['auth', 'admin']);

	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Informacion de la empresa
    	$descargas = Descarga::all();
    	return view('admin.descargas.index', ['descargas' => $descargas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('admin.descargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescargaRequest $request)
    {
    	$validated = $request->validated();

    	$descarga = Descarga::all();
    	$descarga = $descarga->last();

    	if(!$descarga)
    		$num = 1;
    	else
    		$num = $descarga->id+1;

        // ruta de las imagenes guardadas
    	$ruta           = public_path().'/images/';

        // recogida del form
    	$imagenOriginal = $request->file('file_image');


        // crear instancia de imagen
    	$imagen         = Image::make($imagenOriginal);

        // generar un nombre aleatorio para la imagen
    	$temp_name      = 'descargas'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

        //Almacenamiento del PDF
    	$ruta = 'descargas';
    	$path = Storage::putFileAs($ruta, $request->file('file'),'descarga'.$num.'.'.$request->file('file')->getClientOriginalExtension());
    	$rutaNombre = 'descargas'.$num.'.'.$request->file('file')->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
    	if ($imagen->save($ruta . $temp_name, 100)){
    		$descarga             = new Descarga;
    		$descarga->file_image = $temp_name;
    		$descarga->file       = $rutaNombre;
    		$descarga->titulo     = $request->titulo;

    		if($descarga->save())
    			return redirect()->back()->with('alert', "Registro almacenando exitósamente" );
    		else
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    	}else{
    		return redirect()->back()->with('errors', "Ocurrió un error al cargar la imagen" );
    	};
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$descarga    = Descarga::find($id);

    	return view('admin.descargas.edit', ['descarga' => $descarga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate([
    		'titulo' => 'required|string',
    	]);

    	$descarga         = Descarga::find($id);

    	if($request->file('file')!=null){
    		$ruta = 'descargas';
    		$path = Storage::putFileAs($ruta, $request->file('file'),'descarga'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension());
    		$rutaNombre = 'descargas'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension();
    		$descarga->file = $rutaNombre;
    	}

    	if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
    		$ruta           = public_path().'/images/';

            // recogida del form
    		$imagenOriginal = $request->file('file_image');

            // crear instancia de imagen
    		$imagen         = Image::make($imagenOriginal);

            // generar un nombre aleatorio para la imagen
    		$temp_name      = 'descargas'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
    		if ($imagen->save($ruta . $temp_name, 100)){
    			$descarga->file_image = $temp_name;
    			$descarga->titulo     = $request->titulo;

    			if($descarga->save())
    			return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
    			else
    				return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    		}else{
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar la imagen" );
    		};
    	}else{

    		$descarga->titulo    = $request->titulo;

    		if($descarga->save())
    			return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
    		else
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );

    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {  //
        $descarga   = Descarga::find($id);
        $path_image = $descarga->file_image;
        $path_file  = $descarga->file;

        if(\File::exists(public_path('images/'.$path_image))){
            if(Storage::delete('descargas/'.$path_file)){
                if($descarga->delete()){
                    \File::delete(public_path('images/'.$path_image));
                    return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
                }else{
                    return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
                }
            }else{
                return redirect()->back()->with('errors', "Archivo relacionado no encontrado" );
            }
        }else{
            return redirect()->back()->with('errors', "Imagen correspondiente no encontrada" );
        } 
    }
}

