@extends('layouts.app')

@section('content')
    <div class="body-form">
        <div class="card-form ">
            <form class="grid-producto-grid-container form-95" method="POST" action="{{route('inventario.store')}}" enctype="multipart/form-data">
            @csrf
            </form>
        </div>
    </div>
@endsection
