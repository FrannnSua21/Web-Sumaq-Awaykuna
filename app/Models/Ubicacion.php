<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Ubicacion extends Model
{

    protected $table = 'ubicaciones';


    protected $fillable = [

        'region',
        'provincia',
        'distrito',
        'comunidad',
        'direccion',
        'referencia'

    ];



    public function personas()
    {
        return $this->hasMany(
            Persona::class,
            'ubicacion_id'
        );
    }
}
