<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Destacado;

class DestacadoController extends Controller
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
        $destacados = Destacado::all();

        return view('admin.home.destacados.index', ['destacados' => $destacados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $destacado    = Destacado::find($id);

        return view('admin.home.destacados.edit', ['destacado' => $destacado]);
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
        $destacado         = Destacado::find($id);
        

        if($request->file('file')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('file');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_name      = 'destacados'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            if ($imagen->save($ruta . $temp_name, 100)){
                $destacado->file      = $temp_name;
                $destacado->orden     = $request->orden;
                $destacado->titulo    = $request->titulo;
                if($destacado->save())
                    $alert="Registro actualizado exitósamente";
                else
                    $alert="Ocurrió un error al intentar actualizar el registro";
            }else{
                $alert="Error al actualizar la imagen";
            };
        }else{
            
        $destacado->orden     = $request->orden;
        $destacado->titulo    = $request->titulo;

        if($destacado->save())
            $alert="Registro actualizado exitósamente";
        else
            $alert="Ocurrió un error al intentar actualizar el registro";

        }

        return redirect('adm/home/destacados')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
