<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CalidadDescarga;

class CalidadDescargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descargas = CalidadDescarga::all();

        return view('admin.calidad.descargas.index', ['descargas' => $descargas]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calidad.descargas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descarga = CalidadDescarga::all();
        $descarga = $descarga->last();

        if(!$descarga)
            $num = 1;
        else
            $num = $descarga->id+1;

        //Almacenamiento del PDF
        $ruta = 'calidad';
        $path = Storage::putFileAs($ruta, $request->file('file'),'descarga'.$num.'.'.$request->file('file')->getClientOriginalExtension());
        $rutaNombre = 'descarga'.$num.'.'.$request->file('file')->getClientOriginalExtension();

        $descarga             = new CalidadDescarga;
        $descarga->file       = $rutaNombre;
        $descarga->titulo     = $request->titulo;

        if($descarga->save())
            $alert="Registro guardado exitósamente";
        else
            $alert="Ocurrió un error al intentar almacenar el registro";

        return redirect('adm/calidad/descargas')->with('alert', $alert);
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
        $descarga    = CalidadDescarga::find($id);

        return view('admin.calidad.descargas.edit', ['descarga' => $descarga]);
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
        $descarga = CalidadDescarga::all();
        $descarga = $descarga->last();

        //Almacenamiento del PDF
        $ruta = 'calidad';
        $path = Storage::putFileAs($ruta, $request->file('file'),'descarga'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension());
        $rutaNombre = 'descarga'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension();

        $descarga->file       = $rutaNombre;
        $descarga->titulo     = $request->titulo;

        if($descarga->save())
            $alert="Registro actualizado exitósamente";
        else
            $alert="Ocurrió un error al intentar actualizar el registro";

        return redirect('adm/calidad/descargas')->with('alert', $alert);
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
