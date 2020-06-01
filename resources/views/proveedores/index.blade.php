@extends('layouts.app')

@section('content')
    <div class="body">
        <div class="titulo-linia">
            <div class="height-c">
                <div class=" derechaM20 arrow-left link">
                    <a href="{{route('home')}}"></a>
                </div>
                <h3 class="titulo ">Gestión de proveedores</h3>
            </div>
            <div class="btn-primary btn-anyadir link">
                <span class="anyadir">+</span>
                <a href="{{route('proveedores.create')}}">Añadir proveedor</a>
            </div>
        </div>
        <div class="table arriba20">
            <div class="th">Provedor</div>
            <div class="th">Empresa</div>
            <div class="th">Email</div>
            <div class="th">Acciones</div>

            <div class="espacio-blanco"></div>
            @foreach($proveedores as $proveedor)
                <div class="td">{{$proveedor->nombre}}</div>
                <div class="td">{{$proveedor->empresa}}</div>
                <div class="td">{{$proveedor->email}}</div>
                <div class="td acciones">
                    <div class="link tooltip">
                        <span class="tooltiptext">Ver</span>
                        <a href="{{route('proveedores.show',['proveedore' => $proveedor->id])}}"></a>
                        @svg('/svg/interface.svg', 'accion-svg')
                    </div>
                    <div class="link tooltip">
                        <span class="tooltiptext">Editar</span>
                        <a href="{{route('proveedores.edit',['proveedore' => $proveedor->id])}}"></a>
                        @svg('/svg/tool.svg', 'accion-svg')
                    </div>
                    <div class="borrar">
                        <a class="borrar-input tooltip"
                           href="{{ route('proveedores.destroy', $proveedor->id) }}"
                           onclick="event.preventDefault();
                                   document.getElementById('borrar-form{{$proveedor->id}}').submit();">
                            <span class="tooltiptext">Borrar</span>
                            @svg('/svg/delete.svg', 'accion-svg')
                        </a>
                        <form id="borrar-form{{$proveedor->id}}"
                              action="{{ route('proveedores.destroy',$proveedor->id)}}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
