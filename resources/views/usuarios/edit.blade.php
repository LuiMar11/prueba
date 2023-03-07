@extends('layouts.app')
@section('content')
    <div class="contain">
        <div class="card bg-light">
            <div class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Editar usuario</h4>
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <input name="cedula" id="cedula" class="form-control" value="{{ $usuario->cedula }}"
                            type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="nombres" id="nombres" class="form-control"
                            value="{{ $usuario->nombres }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="apellidos" id="apellidos" class="form-control"
                            value="{{ $usuario->apellidos }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" value="{{ $usuario->email }}" type="email">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input name="celular" class="form-control" value="{{ $usuario->celular }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-compass"></i> </span>
                        </div>
                        <input name="direccion" id="direccion" class="form-control"
                            value="{{ $usuario->direccion }}" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-globe"></i> </span>
                        </div>
                        <select name="pais" id="pais" class="form-select">
                            <option value="{{ $usuario->pais }}" selected>{{ $usuario->pais }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country['name']['common'] }}">{{ $country['name']['common'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>
                        <select name="id_categoria" id="id_categoria" class="form-select">
                            @foreach ($categorias as $categoria)
                                @if ($categoria->id == $usuario->id_categoria)
                                    <option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>
                                @else
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <a class="btn btn-danger" href=" {{ route('usuarios.index') }} ">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Editar </button>
                    </div>
                </form>
            </div>
        </div> 

    </div>

    </div>
@endsection
