@extends('layouts.app')
@section('content')
    <div class="contain">
        <div class="card">
            <div class="card-header text-center">
                <h3>Usuarios</h3>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('usuarios.index') }} " method="GET">
                        <div class="input-group">
                            <input name="texto" id="texto" type="text" class="form-control"
                                placeholder="Cédula, Nombres o Apellidos">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="search">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
        </div>
        <div class="row row-cols-2 row-cols-md-1 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body justify-content-center">
                        <table class="table table-hover text-center">
                            <thead class="table-ligth" style="background-color: #31eacb;">
                                <th>Cédula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Dirección</th>
                                <th>Celular</th>
                                <th>Categoria</th>
                                <th>Pais</th>
                                <th>Información</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody class="text-center">
                                @if (count($users) <= 0)
                                    <tr>
                                        <td colspan="12">
                                            No se encontraron resultados
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->cedula }}</td>
                                            <td>{{ $user->nombres }}</td>
                                            <td> {{ $user->apellidos }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->direccion }}</td>
                                            <td>{{ $user->celular }}</td>
                                            <td>
                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id == $user->id_categoria)
                                                    {{ $categoria->nombre }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $user->pais }}</td>
                                            <td> <a href="{{ route('usuarios.show', $user->id) }}" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i> </a> </td>
                                            <td> <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-success">
                                                    <i class="fas fa-pen"></i> </a> </td>
                                            <td>
                                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger" type="submit"
                                                        onclick="return confirm('¿Desea eliminar el usuario?')"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
