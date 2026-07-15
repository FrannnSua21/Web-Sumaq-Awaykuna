<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{


    public function showRegister()
    {

        return view('auth.register');
    }




    public function register(Request $request)
    {
        $data = $request->validate([

            'nombres' => 'required|string|max:100',

            'apellidos' => 'required|string|max:100',

            'dni' => 'required|string|max:8|unique:personas,dni',

            'sexo' => 'required|in:F,M',

            'telefono' => 'required|string|max:20',

            'correo' => 'required|email|unique:personas,correo',

            'usuario' => 'required|string|unique:usuarios,username',

            'password' => 'required|min:6|confirmed',

        ]);


        try {

            DB::transaction(function () use ($data) {


                $persona = Persona::create([

                    'nombres' => $data['nombres'],

                    'apellidos' => $data['apellidos'],

                    'dni' => $data['dni'],

                    'sexo' => $data['sexo'],

                    'telefono' => $data['telefono'],

                    'correo' => $data['correo']

                ]);



                User::create([

                    'persona_id' => $persona->id,

                    'username' => $data['usuario'],

                    'password' => Hash::make(
                        $data['password']
                    ),

                    'cargo_id' => null,

                    'estado' => 'activo'

                ]);
            });


            return redirect()
                ->route('login')
                ->with('success', 'Cuenta creada correctamente');
        } catch (\Exception $e) {


            return back()
                ->withInput()
                ->with(
                    'error',
                    'No se pudo crear la cuenta. Intente nuevamente.'
                );
        }
    }
}
