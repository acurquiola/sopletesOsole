<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Section;
use App\Slider;

class SliderController extends Controller
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
        $sliders=Slider::orderBy('orden')->get();
        return view('admin.home.slider.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$secciones = Section::where('nombre', 'Home')->first();
    	return view('admin.home.slider.create', ['secciones' => $secciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$slider = Slider::all();
    	$slider = $slider->last();


    	if(!$slider)
    		$num = 1;
    	else
    		$num = $slider->id+1;

        // ruta de las imagenes guardadas
        $ruta           = public_path().'/images/';
        
        // recogida del form
        $imagenOriginal = $request->file('file');
        
        // crear instancia de imagen
        $imagen         = Image::make($imagenOriginal);
        
        // generar un nombre aleatorio para la imagen
        $temp_name      = 'slider'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

        // guardar imagen
        // save( [ruta], [calidad])
    	if ($imagen->save($ruta . $temp_name, 100)){
            $slider            = new Slider;
            $slider->file      = $temp_name;
            $slider->orden     = $request->orden;
            $slider->titulo    = $request->titulo;
            $slider->subtitulo = $request->subtitulo;
            
            $section           = Section::find($request->section_id);
        	$slider->section()->associate($section);

        	if($slider->save())
                $alert="Registro guardado exitósamente";
            else
                $alert="Ocurrió un error al intentar almacenar el registro";
        }else{
            $alert="Error al cargar la imagen";
        };



       	return redirect('adm/home/slider/create')->with('alert', $alert);
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
        $secciones = Section::all();
        $slider = Slider::find($id);
        return view('admin.home.slider.edit', ['secciones' => $secciones, 'slider' => $slider]);
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
        $slider         = Slider::find($id);

        if($request->file('file')){
            
            // ruta de las imagenes guardadas
            $ruta           = public_path().'/images/';
            
            // recogida del form
            $imagenOriginal = $request->file('file');
            
            // crear instancia de imagen
            $imagen         = Image::make($imagenOriginal);
            
            // generar un nombre aleatorio para la imagen
            $temp_name      = 'slider'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
            if ($imagen->save($ruta . $temp_name, 100)){
                $slider->file      = $temp_name;
                $slider->orden     = $request->orden;
                $slider->titulo    = $request->titulo;
                $slider->subtitulo = $request->subtitulo;
                
                $section           = Section::find($request->section_id);
                $slider->section()->associate($section);

                if($slider->save())
                    $alert="Registro actualizado exitósamente";
                else
                    $alert="Ocurrió un error al intentar actualizar el registro";
            }else{
                $alert="Error al actualizar la imagen";
            };
        }else{

            $slider->orden     = $request->orden;
            $slider->titulo    = $request->titulo;
            $slider->subtitulo = $request->subtitulo;
            
            $section           = Section::find($request->section_id);
            $slider->section()->associate($section);

            if($slider->save())
                $alert="Registro actualizado exitósamente";
            else
                $alert="Ocurrió un error al intentar actualizar el registro";
        };

        return redirect('adm/home/slider')->with('alert', $alert);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {    //
        $slider  = Slider::find($id);
        $path     = $slider->file;

        if(\File::exists(public_path('images/'.$path))){
            if($slider->delete()){
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
