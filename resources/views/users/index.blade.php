@extends('layouts.app')

@section('content')
    <div class="body">
        <div class="titulo-linia">
            <div class="height-c">
                <div class=" derechaM20 arrow-left link">
                    <a href="{{route('home')}}"></a>
                </div>
                <h3 class="titulo ">Gestion de usuarios</h3>
            </div>
            <div class="btn-primary btn-anyadir link"><span class="anyadir">+</span><a href="{{route('users.create')}}">Añadir usuario</a></div>
        </div>
        <div class="table arriba20">
            <div class="th">Usuario</div>
            <div class="th">Establecimiento</div>
            <div class="th">Rol</div>
            <div class="th">Acciones</div>

            <div class="espacio-blanco"></div>

            @foreach($users as $user)
            <div class="td ">{{$user->email}}</div>
            <div class="td">{{$user->establecimiento->nombre}}</div>
            <div class="td">{{$user->rol->nombre}}</div>
            <div class="td acciones">
                <div class="link tooltip">
                    <span class="tooltiptext">Ver</span>
                    <a href="{{route('users.show',['user' => $user->id])}}"></a>
                    @svg('/svg/interface.svg', 'accion-svg')
                </div>
                <div class="link tooltip">
                    <span class="tooltiptext">Editar</span>
                    <a href="{{route('users.edit',['user' => $user->id])}}"></a>
                    @svg('/svg/tool.svg', 'accion-svg')
                </div>
                <form method="POST" class="tooltip"action="{{route('users.destroy',['user' => $user->id])}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <span class="tooltiptext">Borrar</span>
                    @svg('/svg/delete.svg', 'accion-svg')
                    <div class="form-group">
                        <input type="submit" class="btn btn-danger delete-user" value="Delete user">
                    </div>
                </form>
                <div class="link tooltip">
                    <span class="tooltiptext">Borrar</span>
                    <a href="{{route('users.destroy',['user' => $user->id])}}"></a>

                    @svg('/svg/delete.svg', 'accion-svg')
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
