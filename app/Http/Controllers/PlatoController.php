<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $establecimiento = Auth::user()->establecimiento;
        $platos = $establecimiento->platos;
        return view('platos.index')->with('platos',$platos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Auth::user()->establecimiento->productos;
        $categorias = Categoria::all();

        return view('platos.create')->with('productos', $productos)->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ingredientes = $this->getIngredientes($request->ingredientes);
        $plato = Plato::create([
            "nombre" => $request->nombre,
            "precio" => $request->precio,
            "categoria_id" => $request->categoria,
            "establecimiento_id" => Auth::user()->establecimiento->id
        ]);
        $plato->ingredientes()->saveMany($ingredientes);
        $plato->save();
        return redirect(route("platos.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Auth::user()->establecimiento->productos;
        $categorias = Categoria::all();
        $plato = Plato::find($id);
        $ingredientes = $plato->ingredientes;
        $ingredientesStr= "";
        foreach ($ingredientes as $ingrediente){
            $ingredientesStr .=$ingrediente->nombre.",";
        }
        $ingredientesStr = substr($ingredientesStr, 0, -1);
        return view("platos.show")->with('productos', $productos)->with('categorias',$categorias)->with('plato',$plato)->with("ingredientes",$ingredientesStr);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = Auth::user()->establecimiento->productos;
        $categorias = Categoria::all();
        $plato = Plato::find($id);
        $ingredientes = $plato->ingredientes;
        $ingredientesStr= "";
        foreach ($ingredientes as $ingrediente){
            $ingredientesStr .=$ingrediente->nombre.",";
        }
        $ingredientesStr = substr($ingredientesStr, 0, -1);
        return view('platos.edit')->with('productos', $productos)->with('categorias',$categorias)->with('plato',$plato)->with("ingredientes",$ingredientesStr);
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
        $ingredientes = $this->getIngredientes($request->ingredientes);
        $plato = Plato::find($id);
        $plato->update([
            "nombre" => $request->nombre,
            "precio" => $request->precio,
            "categoria_id" => $request->categoria,
        ]);
        foreach ($plato->ingredientes as $ingrediente){
            $plato->ingredientes()->detach($ingrediente->id);
        }
        $plato->ingredientes()->saveMany($ingredientes);
        $plato->save();
        return redirect(route("platos.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plato = Plato::find($id);
        foreach ($plato->ingredientes as $ingrediente){
            $plato->ingredientes()->detach($ingrediente->id);
        }
        Plato::destroy($id);
        return redirect(route("platos.index"));
    }

    protected function getIngredientes($ingredientesStr){
        $ingredientesArr = explode(';', $ingredientesStr);
        $productos = Auth::user()->establecimiento->productos->all();
        $ingredientes = [];


        foreach ($productos as $producto){
            if (array_search($producto->nombre,$ingredientesArr)!==false){
                $ingredientes[]=$producto;
            }
        }
        return $ingredientes;
    }
}
