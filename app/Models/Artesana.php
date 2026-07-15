<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artesana extends Model
{

    protected $table = 'artesanas';

    public $timestamps = false;


    protected $fillable = [
        'persona_id',
        'especialidad',
        'experiencia',
        'estado'
    ];


    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
    
}
