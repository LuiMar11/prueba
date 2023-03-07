<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
</head>

<body>
    @include('sweetalert::alert')
    <!-- Side-Nav -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100">
            <li class="nav-link">
                <a href="{{ route('usuarios.index') }}" class="mx-2">Usuarios</a>
            </li>
            <li class="nav-link">
                <a href="{{ route('usuarios.create') }}" class="mx-2">Crear usuario</a>
            </li>
        </ul>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>
