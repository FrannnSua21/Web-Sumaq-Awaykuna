<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'usuarios';


    protected $fillable = [

        'persona_id',
        'username',
        'password',
        'cargo_id',
        'estado'

    ];



    protected $hidden = [

        'password',
        'remember_token'

    ];



    protected function casts(): array
    {
        return [

            'password' => 'hashed',

        ];
    }



    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */


    // Usuario pertenece a una persona

    public function persona(): BelongsTo
    {

        return $this->belongsTo(
            Persona::class,
            'persona_id'
        );
    }



    // Usuario tiene un cargo

    public function cargo(): BelongsTo
    {

        return $this->belongsTo(
            Cargo::class,
            'cargo_id'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */


    public function getAuthPassword()
    {

        return $this->password;
    }

    
}
