<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Image;
use App\Descarga;

class DescargaController extends Controller
{
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
    public function store(Request $request)
    {
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
                $alert="Registro guardado exitósamente";
            else
                $alert="Ocurrió un error al intentar almacenar el registro";
        }else{
            $alert="Error al cargar la imagen";
        };



        return redirect('adm/descargas/contenido')->with('alert', $alert);
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
                    $alert="Registro actualizado exitósamente";
                else
                    $alert="Ocurrió un error al intentar actualizar el registro";
            }else{
                $alert="Error al actualizar la imagen";
            };
        }else{

            $descarga->titulo    = $request->titulo;

            if($descarga->save())
                $alert="Registro actualizado exitósamente";
            else
                $alert="Ocurrió un error al intentar actualizar el registro";

        }

        return redirect('adm/descargas/contenido')->with('alert', $alert);
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
