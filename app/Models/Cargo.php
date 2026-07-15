<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Cargo extends Model
{


    protected $table='cargos';



    protected $fillable=[

        'area_id',
        'nombre',
        'descripcion',
        'nivel',
        'estado'

    ];



    public function area(): BelongsTo
    {

        return $this->belongsTo(
            Area::class,
            'area_id'
        );

    }



    public function usuarios()
    {

        return $this->hasMany(
            User::class,
            'cargo_id'
        );

    }


}