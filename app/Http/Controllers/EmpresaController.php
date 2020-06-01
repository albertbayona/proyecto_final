<?php

namespace App\Http\Controllers;

use App\tarjeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Establecimiento;
use App\User;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresa = auth::user()->empresa();

        $tarjeta = $empresa->tarjeta;
        return view('empresa.configuracion')->with('tarjeta',$tarjeta)->with('empresa',$empresa);
    }
    public function update(Request $request)
    {
//        $empresa = User::find(auth::user()->id)->establecimiento->empresa;
        $empresa = auth::user()->empresa();

        $tarjeta = $empresa->tarjeta;
        if($tarjeta==null){
            if($request->numero_tarjeta && $request->titular_tarjeta && $request->fecha_caducidad && $request->CVV) {
                Tarjeta::create([
                    'empresa_id' => $empresa->id,
                    'numero_tarjeta' => $request->numero_tarjeta,
                    'titular_tarjeta' => $request->titular_tarjeta,
                    'fecha_caducidad' => $request->fecha_caducidad,
                    'CVV' => $request->CVV,
                ]);
                $empresa->update(['active' => 1]);
            }
        }else{
            if($request->numero_tarjeta=="" && $request->titular_tarjeta=="" && $request->fecha_caducidad=="" && $request->CVV==""){
                $tarjeta = Tarjeta::find($empresa->id);
                $tarjeta->delete();
                $empresa->update(['active' => 0]);
            }else{
                $tarjeta = Tarjeta::find($empresa->id);
                $tarjeta->update([
                    'numero_tarjeta'=>$request->numero_tarjeta,
                    'titular_tarjeta'=>$request->titular_tarjeta,
                    'fecha_caducidad'=>$request->fecha_caducidad,
                    'CVV' => $request->CVV,
                ]);
            }
        }
        $empresa->update([
            'pais'=>$request->pais,
            'provincia'=>$request->provincia,
            'municipio' => $request->municipio,
            'codigo_postal'=>$request->codigo_postal,
            'calle'=>$request->calle,
            'NIF' => $request->NIF
        ]);
        return redirect(route("configuracion"));
    }
}
