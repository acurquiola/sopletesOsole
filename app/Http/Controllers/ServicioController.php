<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Servicio;
use App\Http\Requests\ServicioRequest;

class ServicioController extends Controller
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
        $servicios = Servicio::all();
        return view('admin.servicios.index', ['servicios' => $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioRequest $request)
    {
        $validated = $request->validated();

        $servicios = Servicio::all();
        $servicios = $servicios->last();

        if($servicios)
            $num = $servicios->id + 1;
        else
            $num = 1;


        if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('file_image');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_nameI      = 'servicios'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            $imagen->save($ruta . $temp_nameI, 100);

        };

        if($request->file('icono')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('icono');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_nameL      = 'servicios_logo'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            $imagen->save($ruta . $temp_nameL, 100);

        };

            $servicio = new Servicio;

                $servicio->titulo     = $request->titulo;
                $servicio->contenido  = $request->contenido;
                $servicio->file_image = $temp_nameI;
                $servicio->icono      = $temp_nameL;

            if($servicio->save())
                return redirect()->back()->with('alert', "Registro almacenando exitósamente" );
            else
                return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
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
        $servicio    = Servicio::find($id);

        return view('admin.servicios.edit', ['servicio' => $servicio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioRequest $request, $id)
    {
        $validatedData = $request->validate([
            'titulo'    => 'required|string',
            'contenido' => 'required|string',
        ]);
        
        $servicio = Servicio::find($id);


        if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('file_image');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_name      = 'servicios'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            if($imagen->save($ruta . $temp_name, 100))
                $servicio->file_image = $temp_name;

        };

        if($request->file('icono')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('icono');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_name      = 'servicios_logo'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            if($imagen->save($ruta . $temp_name, 100))
                $servicio->icono = $temp_name;

        };

            $servicio->titulo = $request->titulo;
            $servicio->contenido = $request->contenido;

            if($servicio->save())
                return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
            else
                return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    { //
        $servicios  = Servicio::find($id);
        $path     = $servicios->file_image;

        if(\File::exists(public_path('images/productos/familias/'.$path))){
            if($servicios->delete()){
                \File::delete(public_path('images/'.$path));
                return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
            }else{
                return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
            }
        }else{
            return redirect()->back()->with('errors', "Imagen correspondiente no existe" );
        } 
    }
}
