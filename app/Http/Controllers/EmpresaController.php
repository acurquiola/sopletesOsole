<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
Use Image;
use App\Empresa;

class EmpresaController extends Controller
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
    public function update(EmpresaRequest $request, $id)
    {
        $validated = $request->validated();

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
                 return redirect()->back()->with('alert', "Registro actualizado exitósamente" );
                else
                 return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
            }else{
                 return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar la imagen" );
            };
        }else{
            
        $empresa->texto    = $request->texto;

        if($empresa->save())
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
    public function destroy($id)
    {
        //
    }
}
