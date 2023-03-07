@extends('layouts.app')
@section('content')
    <div class="contain">
        <div class="card bg-light">
            <div class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Registrar usuario</h4>
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-address-card"></i> </span>
                        </div>
                        <input name="cedula" id="cedula" class="form-control" placeholder="Cédula" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="nombres" id="nombres" class="form-control" placeholder="Nombres" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" id="email" class="form-control" placeholder="Email" type="email">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input name="celular" class="form-control" placeholder="Celular" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-compass"></i> </span>
                        </div>
                        <input name="direccion" id="direccion" class="form-control" placeholder="Dirección" type="text">
                    </div>
                    <div class="form-group input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-globe"></i> </span>
                        </div>
                        <select name="pais" id="pais" class="form-select">
                            <option default selected>---Seleccione Pais---</option>
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
                            <option selected="">Seleccionar categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <a class="btn btn-danger" href=" {{ route('usuarios.index') }} ">Cancelar</a>
                        <button type="submit" class="btn btn-primary"> Registrar </button>
                    </div>
                </form>
            </div>
        </div> <!-- card.// -->

    </div>

    </div>
@endsection
