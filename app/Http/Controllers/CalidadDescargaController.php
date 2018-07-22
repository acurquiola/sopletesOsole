<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CalidadDescargaRequest;
use Illuminate\Support\Facades\Storage;
use App\CalidadDescarga;

class CalidadDescargaController extends Controller
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
    public function store(CalidadDescargaRequest $request)
    {
        $validated = $request->validated();

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
           return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
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
        $validatedData = $request->validate([
            'titulo' => 'required|string',
        ]);

        $descarga = CalidadDescarga::all();
        $descarga = $descarga->last();

        if($request->file('file')){
            //Almacenamiento del PDF
            $ruta       = 'calidad';
            $path       = Storage::putFileAs($ruta, $request->file('file'),'descarga'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension());
            $rutaNombre = 'descarga'.$descarga->id.'.'.$request->file('file')->getClientOriginalExtension();

            $descarga->file       = $rutaNombre;
        }
        $descarga->titulo     = $request->titulo;

        if($descarga->save())
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
    {
        //
        $cd  = CalidadDescarga::find($id);

        $path     = $cd->file;
        if(Storage::delete('calidad/'.$path)){
            if($cd->delete()){
                return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
            }else{
                return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
            }
        }else{
            return redirect()->back()->with('errors', "Archivo correspondiente no existe" );
        }   
    }
}
