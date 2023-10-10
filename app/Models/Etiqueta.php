<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    const REGEX_NOMBRES_CSV = '/^[a-zA-Z,]+$/';

    const REGEX_NOMBRE = '/^[a-zA-Z]+$/';

    protected $fillable = [
        'nombre',
    ];

    public static function filtrarNombres(array $etiquetas)
    {
        $etiquetas_unicas = array_unique($etiquetas);

        return array_filter($etiquetas_unicas, function ($etiqueta) {

            return preg_match(self::REGEX_NOMBRE, $etiqueta);

        });
    }

    public static function convertirCsvArray(string $etiquetas_csv)
    {
        return array_map(function ($etiqueta) {

            return strtolower( trim($etiqueta) );
            
        }, str_getcsv($etiquetas_csv));
    }

    public static function generarCsvArray(string $etiquetas_csv)
    {
        return self::filtrarNombres(

            self::convertirCsvArray($etiquetas_csv)

        );
    }
    

    // Attributes
    
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] => strtolower( trim($value) );
    }


    // Relations
    
    public function canciones()
    {
        return $this->belongsToMany(Cancion::class)->using(CancionEtiqueta::class);
    }
}
