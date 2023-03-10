<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Services\RestCountriesService;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = $request->get('texto');
        $categorias = Categoria::all();
        $users = DB::table('usuarios')
            ->select(
                '*'
            )->where('nombres', 'LIKE', '%' . $texto . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $texto . '%')
            ->orWhere('cedula', 'LIKE', '%' . $texto . '%')
            ->paginate(10);
        return view('usuarios.index', compact('users', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RestCountriesService $restCountriesService)
    {
        $categorias = Categoria::all();
        $countries = $restCountriesService->getCountries();
        return view('usuarios.create', compact('categorias', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $user = request()->except('_token');
        $validator = Validator::make($request->all(), [
            'cedula' => 'required',
            'nombres' => ['required', 'string', 'min:5', 'max:100', 'regex:/^[a-zA-Z\s]+$/'],
            'apellidos' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email',  'max:150'],
            'direccion' => ['required', 'string',  'max:180'],
            'celular' => ['required', 'numeric', 'regex:/^\d+$/'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ((Usuario::where('cedula', $request->cedula)->exists()) || (Usuario::where('email', $request->email)->exists())) {
                Alert::warning('El Usuario ya existe');
            } else {
                Usuario::insert($user);
                Alert::success('Usuario registrado correctamente');
                //Mail::to($request->get('email'))->send(new NewUserNotification($user));
            }
        }
        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorias = Categoria::all();
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, RestCountriesService $restCountriesService)
    {
        $usuario = Usuario::findOrFail($id);
        $categorias = Categoria::all();
        $countries = $restCountriesService->getCountries();
        return view('usuarios.edit', compact('usuario', 'countries', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except('_token', '_method');
        Usuario::where('id', '=', $id)->update($datos);
        $usuario = Usuario::findOrFail($id);
        Alert::success('Usuario editado correctamente');
        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Usuario::destroy($id);
        Alert::success('Se elimin?? el usuario correctamente');
        return redirect(route('usuarios.index'));
    }
}
