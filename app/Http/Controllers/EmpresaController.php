<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Image;
use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::first();

        return view('admin.empresa.index', ['empresa' => $empresa]); 
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
        $empresa    = Empresa::find($id);

        return view('admin.empresa.edit', ['empresa' => $empresa]);
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
        $empresa         = Empresa::find($id);
        

        if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('file_image');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_name      = 'quienessomos.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            if ($imagen->save($ruta . $temp_name, 100)){
                $empresa->file_image = $temp_name;
                $empresa->texto      = $request->texto;
                if($empresa->save())
                    $alert="Registro actualizado exitósamente";
                else
                    $alert="Ocurrió un error al intentar actualizar el registro";
            }else{
                $alert="Error al actualizar la imagen";
            };
        }else{
            
        $empresa->texto    = $request->texto;

        if($empresa->save())
            $alert="Registro actualizado exitósamente";
        else
            $alert="Ocurrió un error al intentar actualizar el registro";

        }

        return redirect('adm/empresa/contenido')->with('alert', $alert);
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
