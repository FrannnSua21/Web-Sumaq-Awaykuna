<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    private string $carpetaFotos = 'uploads/personas';

    public function perfil()
    {
        $usuario = auth()->user()->load(['persona.ubicacion', 'cargo']);

        return view('perfil', compact('usuario'));
    }

    public function configuracion()
    {
        $usuario = auth()->user()->load(['persona.ubicacion', 'cargo']);

        return view('configuracion', compact('usuario'));
    }

    public function actualizarPerfil(Request $request)
    {
        $usuario = auth()->user();

        $request->validate([
            'nombres'          => ['required', 'string', 'max:80'],
            'apellidos'        => ['required', 'string', 'max:100'],
            'dni'              => ['nullable', 'string', 'max:8', Rule::unique('personas', 'dni')->ignore(optional($usuario->persona)->id)],
            'fecha_nacimiento' => ['nullable', 'date'],
            'sexo'             => ['nullable', 'in:F,M'],
            'telefono'         => ['nullable', 'string', 'max:20'],
            'correo'           => ['nullable', 'email', 'max:120'],
            'foto'             => ['nullable', 'image', 'max:4096'],
            'username'         => ['required', 'string', 'max:50', Rule::unique('usuarios', 'username')->ignore($usuario->id)],
        ]);

        // Si no tiene persona asociada (o el persona_id apunta a una fila
        // que ya no existe), se crea una nueva y se enlaza automáticamente.
        $persona = $usuario->persona ?? new Persona();

        $rutaFoto = $persona->foto;

        if ($request->hasFile('foto')) {
            if ($rutaFoto && File::exists(public_path($rutaFoto))) {
                File::delete(public_path($rutaFoto));
            }

            $destino = public_path($this->carpetaFotos);
            if (!File::exists($destino)) {
                File::makeDirectory($destino, 0755, true);
            }

            $archivo = $request->file('foto');
            $nombre = uniqid() . '_' . time() . '.' . $archivo->getClientOriginalExtension();
            $archivo->move($destino, $nombre);

            $rutaFoto = $this->carpetaFotos . '/' . $nombre;
        }

        $persona->nombres          = $request->nombres;
        $persona->apellidos        = $request->apellidos;
        $persona->dni              = $request->dni;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->sexo             = $request->sexo;
        $persona->telefono         = $request->telefono;
        $persona->correo           = $request->correo;
        $persona->foto             = $rutaFoto;
        $persona->save();

        $usuario->username   = $request->username;
        $usuario->persona_id = $persona->id;
        $usuario->save();

        return redirect()->route('perfil')->with('success', 'Tus datos se actualizaron correctamente');
    }
}
