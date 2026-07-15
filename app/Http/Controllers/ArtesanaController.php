<?php

namespace App\Http\Controllers;

use App\Models\Artesana;
use App\Models\Persona;
use Illuminate\Http\Request;

class ArtesanaController extends Controller
{

    public function index()
    {

        // Artesanas registradas
        $artesanas = Artesana::with([
            'persona.ubicacion'
        ])->get();



        // Personas que todavía NO son artesanas
        $personasDisponibles = Persona::whereDoesntHave('artesana')
            ->get();



        return view('artesanas', compact(
            'artesanas',
            'personasDisponibles'
        ));
    }





    public function store(Request $request)
    {


        $request->validate([

            'persona_id' => 'required',

            'especialidad' => 'required',

            'experiencia' => 'required|integer'

        ]);



        Artesana::create([

            'persona_id' => $request->persona_id,

            'especialidad' => $request->especialidad,

            'experiencia' => $request->experiencia,

            'estado' => 'activa'

        ]);



        return redirect()
            ->route('artesanas')
            ->with(
                'success',
                'La persona ahora pertenece al grupo de artesanas'
            );
    }
}
