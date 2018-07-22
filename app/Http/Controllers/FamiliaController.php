<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Familia;
use App\Producto;

class FamiliaController extends Controller
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
    	$familias = Familia::all();
    	return view('admin.productos.familias.index', ['familias' => $familias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productos.familias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre'     => 'required|string',
            'file_image' => 'required|image',
        ]);

        $familia = Familia::all();
        $familia = $familia->last();

        if(!$familia)
            $num = 1;
        else
            $num = $familia->id+1;

        // ruta de las imagenes guardadas
        $ruta           = public_path().'/images/productos/familias/';
        
        // recogida del form
        $imagenOriginal = $request->file('file_image');

        
        // crear instancia de imagen
        $imagen         = Image::make($imagenOriginal);
        
        // generar un nombre aleatorio para la imagen
        $temp_name      = 'familia'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
        if ($imagen->save($ruta . $temp_name, 100)){
            $familia             = new Familia;
            $familia->file_image = $temp_name;
            $familia->nombre     = $request->nombre;

            if($familia->save())
                $alert="Registro guardado exitósamente";
            else
                $alert="Ocurrió un error al intentar almacenar el registro";
        }else{
            $alert="Error al cargar la imagen";
        };



        return redirect('adm/productos/familias')->with('alert', $alert);
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
        $familia = Familia::find($id);
        return view('admin.productos.familias.edit', ['familia' => $familia]);
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
            'nombre'     => 'required|string',
        ]);

        $familia = Familia::find($id);

        // ruta de las imagenes guardadas
        $ruta           = public_path().'/images/productos/familias/';
        
        // recogida del form
        $imagenOriginal = $request->file('file_image');

        
        // crear instancia de imagen
        $imagen         = Image::make($imagenOriginal);
        
        // generar un nombre aleatorio para la imagen
        $temp_name      = 'familia'.$familia->id.'.'.$imagenOriginal->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
        if ($imagen->save($ruta . $temp_name, 100)){
            $familia->file_image = $temp_name;
            $familia->nombre     = $request->nombre;

            if($familia->save())
                $alert="Registro actualizado exitósamente";
            else
                $alert="Ocurrió un error al intentar actualizar el registro";
        }else{
            $alert="Error al cargar la imagen";
        };



        return redirect('adm/productos/familias')->with('alert', $alert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {    //
        $familia  = Familia::find($id);
        $path     = $familia->file_image;
        $productos = Producto::where('familia_id', $familia->id);

        if($productos->count()<=0){
            if(\File::exists(public_path('images/productos/familias/'.$path))){
                if($familia->delete()){
                    \File::delete(public_path('images/productos/familias/'.$path));
                    return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
                }else{
                    return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
                }
            }else{
                return redirect()->back()->with('errors', "Imagen correspondiente no existe" );
            } 
        }else{
            return redirect()->back()->with('errors', "La familia que desea eliminar tiene productos asociados. No se pudo completar la operación" );
        }  
    }
}
