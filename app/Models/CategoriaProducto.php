<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CategoriaProducto extends Model
{

    protected $table = 'categorias_productos';


    public $timestamps = false;



    protected $fillable = [
        'nombre',
        'descripcion'
    ];



    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'categoria_id'
        );
    }
}
