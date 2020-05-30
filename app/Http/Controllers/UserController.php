<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use App\Rol;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaID = auth::user()->establecimiento->empresa->id;
        $establecimientosIDs= Establecimiento::select('id')->where('empresa_id',$empresaID)->get()->toArray();
        $users = User::where("active",1)->whereIn('establecimiento_id',$establecimientosIDs )->get();

        return view('users.index',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        $empresa_id = $user->establecimiento->empresa->id;
        $establecimientos = Establecimiento::where('empresa_id',$empresa_id)->get();

        $roles = Rol::where('id','!=',1)->get();

        return view('users.create')->with('roles',$roles)->with('establecimientos',$establecimientos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:usuarios',
            'contrasenya' => 'required'

        ]);

//        $path=$request->file('photo')->store('photos','public');
        User::create([
            'nombre'=>$request->nombre,
            'apellidos'=>$request->apellidos,
            'email'=>$request->email,
            'password' => bcrypt($request->contrasenya),
            'telefono'=>$request->telefono,
            'establecimiento_id'=>$request->establecimiento,
            'rol_id'=>$request->rol,
//            'url_foto'=>$path
        ]);
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return  view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $empresa_id = $user->establecimiento->empresa->id;
        $establecimientos = Establecimiento::where('empresa_id',$empresa_id)->get();
        $roles = Rol::where('id','!=',1)->get();

        return view('users.edit')->with('roles',$roles)->with('establecimientos',$establecimientos)->with('user',$user);
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

        $user = User::find($id);

        $request->validate([
            'email' => 'required|email|unique:usuarios,email,'.$user->id,
            'nombre' => 'required'
        ]);
        $datos= [
            'nombre'=>$request->nombre,
            'apellidos'=>$request->apellidos,
            'email' => $request->email,
            'telefono'=>$request->telefono,
            'establecimiento_id'=>$request->establecimiento,
            'rol_id'=>$request->rol,
//            'url_foto'=>$path
        ];

        if ($request->contrasenya != ""){
            $datos['password']=bcrypt($request->contrasenya);
        }

//        $path=$request->file('photo')->store('photos','public');
        User::find($id)->update($datos);
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user::update(['active'=>'0']);

        return  redirect(route('users.index'));

    }
}
