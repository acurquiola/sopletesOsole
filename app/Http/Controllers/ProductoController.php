<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductoRequest;

use Image;

use App\Etiqueta;
use App\Familia;
use App\FamiliaEtiqueta;
use App\Galeria;
use App\Producto;

class ProductoController extends Controller
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
    	$familias  = Familia::all();
    	$productos = Producto::paginate(7);
    	return view('admin.productos.index', ['familias' => $familias, 'productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	$familias = Familia::all();
    	return view('admin.productos.create', ['familias' => $familias]);
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
            'nombre'      => 'required|string',
            'orden'       => 'required|string|max:2',
            'descripcion' => 'required|string',
            'familia_id'  => 'required',
            'file_image'  => 'required | image',
        ]);

    	$producto = Producto::all();
    	$producto = $producto->last();

    	if(!$producto)
    		$num = 1;
    	else
    		$num = $producto->id+1;

        //Almacenamiento del PDF


    	$producto              = new Producto;

    	if($request->file('file')!=null){
    		$ruta       = 'productos';
    		$path       = Storage::putFileAs($ruta, $request->file('file'),'producto'.$num.'.'.$request->file('file')->getClientOriginalExtension());
    		$rutaNombre = 'producto'.$num.'.'.$request->file('file')->getClientOriginalExtension();
    		$producto->file        = $rutaNombre;
    	}


    	if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
    		$ruta           = public_path().'/images/productos/';

            // recogida del form
    		$imagenOriginal = $request->file('file_image');

            // crear instancia de imagen
    		$imagen         = Image::make($imagenOriginal);

            // generar un nombre aleatorio para la imagen
    		$temp_name      = 'productos'.$num.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
    		if($imagen->save($ruta . $temp_name, 100))
    			$producto->file_image = $temp_name;

    	};

    	$producto->nombre      = $request->nombre;
    	$producto->descripcion = $request->descripcion;
    	$producto->orden       = $request->orden;


    	$familia               = Familia::find($request->familia_id);
    	$producto->familia()->associate($familia);

    	if($producto->save())
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
        //
    	$producto = Producto::find($id);
    	$familias = Familia::all();
    	return view('admin.productos.edit', ['familias' => $familias, 'producto' => $producto]);
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
    		'nombre'      => 'required|string',
    		'orden'       => 'required|string|max:2',
    		'descripcion' => 'required|string',
    		'familia_id'  => 'required|',
    	]);

    	$producto = Producto::find($id);

        //Almacenamiento del PDF
    	if($request->file('file')!=null){
    		$ruta       = 'productos';
    		$path       = Storage::putFileAs($ruta, $request->file('file'),'producto'.$producto->id.'.'.$request->file('file')->getClientOriginalExtension());
    		$rutaNombre = 'producto'.$producto->id.'.'.$request->file('file')->getClientOriginalExtension();
    		$producto->file        = $rutaNombre;
    	}


    	if($request->file('file_image')!=null){
            // ruta de las imagenes guardadas
    		$ruta           = public_path().'/images/productos/';

            // recogida del form
    		$imagenOriginal = $request->file('file_image');

            // crear instancia de imagen
    		$imagen         = Image::make($imagenOriginal);

            // generar un nombre aleatorio para la imagen
    		$temp_name      = 'productos'.$id.'.'.$imagenOriginal->getClientOriginalExtension();

            // guardar imagen
            // save( [ruta], [calidad])
    		if($imagen->save($ruta . $temp_name, 100))
    			$producto->file_image = $temp_name;

    	};

    	$producto->nombre      = $request->nombre;
    	$producto->descripcion = $request->descripcion;
    	$producto->orden       = $request->orden;


    	$familia               = Familia::find($request->familia_id);
    	$producto->familia()->associate($familia);

    	if($producto->save())
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
    public function destroy($id)
    {
        //
    }


    /**
     * Crea la galeria de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriaCreate($id)
    {
        //
    	$producto = Producto::find($id);

    	return view('admin.productos.galeria.create', ['producto' => $producto]);

    }

    /**
     * Almacenar la galeria de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriaStore(Request $request)
    {
    	$validatedData = $request->validate([
    		'file_image'      => 'required|image',
    		'producto_id'     => 'required',
    	]);

    	$producto_id = $request->producto_id;
    	$producto    = Producto::find($producto_id);
    	$status = 0;


    	foreach ($request->file('file_image') as $i) {
    		$img = Galeria::all();
    		$img = $img->last();

    		if($img!=null)
    			$num = $img->id +1;
    		else
    			$num = 1;

    		$galeria = new Galeria;

    		$ruta           = public_path().'/images/productos/galeria/';
    		$imagenOriginal = $i;
    		$imagen         = Image::make($imagenOriginal);
    		$temp_name      = 'galeria'.$num.'-producto'.$producto_id.'.'.$imagenOriginal->getClientOriginalExtension();
    		$imagen->save($ruta . $temp_name, 100);

    		$galeria->file_image = $temp_name;
    		$galeria->producto()->associate($producto);
    		if($galeria->save())
    			$status = 1;
    	}

    	if($status==1){
    		$producto->galeria = 1;
    		$producto->save();
    		return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
    	}else{
    		return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    	}
    }

    /**
     * Ver la galeria de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriaView($id)
    {
        //
    	$producto = Producto::find($id)->with('galerias')->first();

    	return view('admin.productos.galeria.show', ['producto' => $producto]);

    }

    /**
     * Eliminar imagen
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function galeriaDelete($id)
    {
        //
    	$galeria  = Galeria::find($id);
    	$producto = Producto::find($galeria->producto->id);

    	$path     = $galeria->file_image;
    	if(\File::exists(public_path('images/productos/galeria/'.$galeria->file_image))){
    		if($galeria->delete()){
    			\File::delete(public_path('images/productos/galeria/'.$path));

    			$galeria = Galeria::where('producto_id', $producto->id)->get();
    			if($galeria->count()==0){
    				$producto->galeria = 0;
    				$producto->save();
    				return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
    			}
    			return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
    		}else{
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    		}
    	}else{
    		return redirect()->back()->with('errors', "Imagen correspondiente no existe" );
    	}	
    }


    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function familiaEtiquetaCreate()
    {
        //
    	$familias = FamiliaEtiqueta::all();
    	return view('admin.productos.familias.etiquetas.create', ['familias' => $familias] );

    }


    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function familiaEtiquetaStore(Request $request)
    {
    	$validatedData = $request->validate([
    		'nombre'      => 'required|string',
    	]); 

        $familia_etiqueta         = new FamiliaEtiqueta;
        $familia_etiqueta->nombre = $request->nombre;


    	if($familia_etiqueta->save())
			return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
    	else
    		return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    }

    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function familiaEtiquetaDelete($id)
    {
        //
    	$familia  = FamiliaEtiqueta::find($id);
    	$etiqueta = Etiqueta::where('familia_etiqueta_id' , $familia->id)->get();

    	if($etiqueta->count()>0){
			return redirect()->back()->with('alert', "La familia de etiquetas tiene registros asociados" );
    	}else{
    		if($familia->delete()){
				return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
    		}else{
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    		}
    	}

    }

    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etiquetaCreate($id)
    {
        //
    	$producto = Producto::find($id);
    	$familias = FamiliaEtiqueta::all();

    	return view('admin.productos.etiquetas.create', ['producto' => $producto, 'familias' => $familias]);

    }

    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etiquetaView($id)
    {
        //
    	$etiquetas = Etiqueta::with('familia_etiqueta')->where('producto_id', $id)->get();
    	return view('admin.productos.etiquetas.show', ['etiquetas' => $etiquetas]);
    }


    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etiquetaStore(Request $request)
    {
        //
    	$validatedData = $request->validate([
    		'codigo'              => 'required|alpha_dash',
    		'descripcion'         => 'required|string',
    		'caracteristicas'     => 'required|string',
    		'file_image'          => 'required|image',
    		'producto_id'         => 'required',
    		'familia_etiqueta_id' => 'required',
    	]);

    	$producto_id = $request->producto_id;
    	$producto    = Producto::find($producto_id);

    	if ($request->file('file_image')) {

    		$img = Etiqueta::all();
    		$img = $img->last();

    		if($img!=null)
    			$num = $img->id +1;
    		else
    			$num = 1;

    		$etiqueta = new Etiqueta;

    		$ruta           = public_path().'/images/productos/etiquetas/';
    		$imagenOriginal = $request->file('file_image');
    		$imagen         = Image::make($imagenOriginal);
    		$temp_name      = 'etiqueta'.$num.'-producto'.$producto_id.'.'.$imagenOriginal->getClientOriginalExtension();

    		if($imagen->save($ruta . $temp_name, 100)){
    			$etiqueta->codigo          = $request->codigo;
    			$etiqueta->descripcion     = $request->descripcion;
    			$etiqueta->caracteristicas = $request->caracteristicas;
    			$etiqueta->file_image      = $temp_name;

    			$etiqueta->producto()->associate($producto);
    			$etiqueta->familia_etiqueta()->associate($request->familia_etiqueta_id);

    			if($etiqueta->save()){
    				$producto->etiqueta = 1;
    				$producto->save();
					return redirect()->back()->with('alert', "Registro almacenado exitósamente" );
    			}else{
    				return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    			}

    		}else{
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
    		}
    	}
    }


    /**
     * Crea la etiqueta de un producto
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function etiquetaDelete($id)
    {
        //
    	$etiqueta = Etiqueta::find($id);
    	$producto = Producto::find($etiqueta->producto->id);

    	$path     = $etiqueta->file_image;

    	if(\File::exists(public_path('images/productos/etiquetas/'.$etiqueta->file_image))){
    		if($etiqueta->delete()){
    			\File::delete(public_path('images/productos/etiquetas/'.$path));

    			$etiqueta = Etiqueta::where('producto_id', $producto->id)->get();
    			if($etiqueta->count()==0){
    				$producto->etiqueta = 0;
    				$producto->save();
					return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
    			}
				return redirect()->back()->with('alert', "Registro eliminado exitósamente" );
    		}else{
    			return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    		}
    	}else{
    		return redirect()->back()->with('errors', "Imagen correspondiente no existe" );
    	}   
    	return redirect()->back()->with('alert', $alert);
    }
}