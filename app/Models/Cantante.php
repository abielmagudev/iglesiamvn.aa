<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cantante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'notas',
    ];


    // Atributos
    
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = Str::title( trim($value) );
    }


    // Relations
    
    public function canciones()
    {
        return $this->belongsToMany(Cancion::class)->using(CancionCantante::class)->withPivot([
            'cifrado_tonal',
            'armonia_tonal',
            'notas'
        ]);
    }
}
