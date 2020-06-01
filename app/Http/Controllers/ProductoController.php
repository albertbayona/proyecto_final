<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Dumper\PoFileDumper;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rules =['nombre'=>'required',
            'en_stock'=>'required|numeric',
            'minimo_recomendable'=>'numeric'];
    public function index()
    {
        $establecimiento = Auth::user()->establecimiento;
        $productos = $establecimiento->productos;
        return view('inventario.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Auth::user()->establecimiento->proveedores;
//        $proveedores = [];
//        foreach ($productos as $producto){
//            $proveedores[$producto->proveedor->id]=$proveedor;
//        }

        return view('inventario.create')->with('proveedores',$proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        Producto::create([
            "nombre"=>$request->nombre,
            "en_stock"=>$request->en_stock,
            "minimo_recomendable"=>$request->minimo_recomendable,
            "proveedor_id"=> $request->proveedor_id,
            'establecimiento_id' => auth::user()->establecimiento->id
        ]);

        return redirect(route("inventario.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $proveedores = Auth::user()->establecimiento->proveedores;
        $producto = Producto::find($id);

        return view('inventario.show')->with('proveedores',$proveedores)->with('producto',$producto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedores = Auth::user()->establecimiento->proveedores;
        $producto = Producto::find($id);

        return view('inventario.edit')->with('proveedores',$proveedores)->with('producto',$producto);
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
        $request->validate($this->rules);


        Producto::find($id)->update([
            "nombre"=>$request->nombre,
            "en_stock"=>$request->en_stock,
            "minimo_recomendable"=>$request->minimo_recomendable,
            "proveedor_id"=> $request->proveedor_id,
        ]);
        return redirect(route("inventario.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        foreach ($producto->platos as $plato){
            $producto->platos()->detach($plato->id);
        }

        Producto::destroy($id);
        return redirect(route("inventario.index"));

    }
}
