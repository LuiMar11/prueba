@extends('layouts.app')
@section('content')
    <div class="contain">
        <div class="card bg-light">
            <div class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">{{ $usuario->nombre }}</h4>
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <input disabled name="cedula" id="cedula" class="form-control" value="{{ $usuario->cedula }}"
                            type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input disabled name="nombres" id="nombres" class="form-control" value="{{ $usuario->nombres }}"
                            type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input disabled name="apellidos" id="apellidos" class="form-control"
                            value="{{ $usuario->apellidos }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input disabled name="email" id="email" class="form-control" value="{{ $usuario->email }}"
                            type="email">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input disabled name="celular" class="form-control" value="{{ $usuario->celular }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-compass"></i> </span>
                        </div>
                        <input disabled name="direccion" id="direccion" class="form-control"
                            value="{{ $usuario->direccion }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-globe"></i> </span>
                        </div>
                        <input disabled name="pais" id="pais" class="form-control" value="{{ $usuario->pais }}"
                            type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>

                        @foreach ($categorias as $categoria)
                            @if ($categoria->id == $usuario->id_categoria)
                                <input disabled name="id_categoria" id="id_categoria" class="form-control"
                                    value="{{ $categoria->nombre }}" type="text">
                            @endif
                        @endforeach
                    </div>

                    <div class="form-group mt-3">
                        <a class="btn btn-danger" href=" {{ route('usuarios.index') }} ">Volver</a>
                    </div>
                </form>
            </div>
        </div> <!-- card.// -->

    </div>

    </div>
@endsection
