<?php

namespace App\Http\Controllers;

use App\Establecimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresaID = auth::user()->establecimiento->empresa->id;
        $establecimientos= Establecimiento::where('empresa_id',$empresaID)->get();
        return view('establecimientos.index')->with('establecimientos',$establecimientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('establecimientos.create');
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
            'nombre'=>'required',
        ]);
        if (!is_int($request->mesas)|| $request->mesas<0){
            $request->mesas = 0;
        }
        Establecimiento::create([
            'nombre'=>$request->nombre,
            'pais'=>$request->pais,
            'provincia'=>$request->provincia,
            'municipio' => $request->municipio,
            'codigo_postal'=>$request->codigo_postal,
            'calle'=>$request->calle,
            'mesas'=>$request->mesas,
            'empresa_id' => auth::user()->establecimiento->empresa->id,
//            'url_foto'=>$path
        ]);
        return redirect(route('establecimientos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establecimiento = Establecimiento::find($id);
        return view('establecimientos.show')->with('establecimiento',$establecimiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $establecimiento = Establecimiento::find($id);
        return view('establecimientos.edit')->with('establecimiento',$establecimiento);
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

        if (!is_int($request->mesas)|| $request->mesas<0){
            $request->mesas = 0;
        }
        //Abajo se hace la validacion de que sea numero y mayor a 0
        $request->validate([
            'nombre'=>'required',
        ]);
        $establecimiento = Establecimiento::find($id);
        $establecimiento->update([
            'nombre'=>$request->nombre,
            'pais'=>$request->pais,
            'provincia'=>$request->provincia,
            'municipio' => $request->municipio,
            'codigo_postal'=>$request->codigo_postal,
            'calle'=>$request->calle,
            'mesas'=>$request->mesas,
            'empresa_id' => auth::user()->establecimiento->empresa->id,
//            'url_foto'=>$path
        ]);
        return redirect(route('establecimientos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
