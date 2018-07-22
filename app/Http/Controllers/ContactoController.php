<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactoRequest;
use Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('contacto.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$data = array(['nombre'   => $request->get('nombre'),
								    		'telefono' => $request->get('telefono'),
								    		'empresa'  => $request->get('empresa'),
								    		'email'    => $request->get('email'),
								    		'mensaje'  => $request->get('mensaje')]);
    	Mail::send('contacto.email', $data[0], function($message){
	    		$message->subject('Te han enviado un mensaje desde Sopletes Liga');
	    		$message->to(env('ADMIN_MAIL'));
	    	}
	    );

    	return redirect()->back()->with('alert', '¡Gracias por contactarnos!');
    }
}
