<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disenio extends Model
{


    protected $table = "disenios";


    public $timestamps = false;



    protected $fillable = [

        'nombre',
        'descripcion',
        'imagen',
        'categoria_id',
        'creador_id',
        'estado'

    ];



    public function categoria()
    {

        return $this->belongsTo(
            CategoriaProducto::class,
            'categoria_id'
        );
    }
}
