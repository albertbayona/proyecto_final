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
//        dd($establecimientosIDs);
        $users = User::whereIn('establecimiento_id',$establecimientosIDs )->get();
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
            'email'=>'required|unique:users',
        ]);
        $path=$request->file('photo')->store('photos','public');
        User::create(['description'=>$request->description,
            'price'=>$request->price,
            'owner_id'=>$request->owner_id,
            'photo'=>$path
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "hola ".$id;
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
        //
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
