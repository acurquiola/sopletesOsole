<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tipousuario;
use App\Http\Requests\UserRequest;

class UserController extends Controller
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
        $usuarios = User::with('tipo')->paginate(7);
        return view('admin.usuarios.index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        $tipos = TipoUsuario::all();
        return view('admin.usuarios.create', ['tipos' => $tipos]);
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $user           = New User();
        if($request->password == null){
            return view('admin.usuarios.create')->with('errors', "La contraseña es requerida" );
        }else{
            $user->username = $request->username;
            $user->nombre   = $request->nombre.' '.$request->apellido;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
            $tipo           = TipoUsuario::find($request->tipo_usuario_id);
            $user->tipo()->associate($tipo);

            if($user->save())
                 return redirect()->back()->with('alert', "Usuario registrado exitósamente" );
            else
                 return redirect()->back()->with('errors', "Ocurrió un error al intentar almacenar el registro" );
        }
    }

    public function edit($id){
        $tipos = TipoUsuario::all();
        $user  = User::find($id);
        return view('admin.usuarios.edit', ['tipos' => $tipos, 'user' => $user]);
    }

    public function update(UserRequest $request, $id){
        $validated = $request->validated();

        $user           = User::find($id);
        $user->username = $request->username;
        $user->nombre   = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email    = $request->email;
        $tipo           = TipoUsuario::find($request->tipo_usuario_id);
        $user->tipo()->associate($tipo);
        if($request->password != null){
            $user->password = bcrypt($request->password);
        }   

        if($user->save())
            return redirect()->back()->with('alert', "Usuario actualizado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar actualizar el registro" );
    }

    public function eliminar($id){
        $user = User::find($id);

        if($user->delete())
            return redirect()->back()->with('alert', "Usuario eliminado exitósamente" );
        else
            return redirect()->back()->with('errors', "Ocurrió un error al intentar eliminar el registro" );
    }

}
