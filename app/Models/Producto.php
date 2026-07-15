<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $table = 'productos';

    public $timestamps = false;


    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'categoria_id',
        'disenio_id',
        'precio_compra',
        'precio_venta',
        'stock',
        'stock_minimo',
        'imagen',
        'estado',
        'fecha_creacion'
    ];


    public function categoria()
    {
        return $this->belongsTo(
            CategoriaProducto::class,
            'categoria_id'
        );
    }


    public function disenio()
    {
        return $this->belongsTo(
            Disenio::class,
            'disenio_id'
        );
    }


    public function artesanas()
    {
        return $this->belongsToMany(
            Artesana::class,
            'producto_artesana',
            'producto_id',
            'artesana_id'
        );
    }
}