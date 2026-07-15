<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Persona extends Model
{

    protected $table = 'personas';


    protected $fillable = [

        'dni',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'sexo',
        'telefono',
        'correo',
        'foto',
        'ubicacion_id'

    ];



    public function usuario(): HasOne
    {

        return $this->hasOne(
            User::class,
            'persona_id'
        );
    }

    public function artesana()
    {
        return $this->hasOne(Artesana::class);
    }


    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
