<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CancionCantante extends Pivot
{
    protected $table = 'cancion_cantante'; 

    public static $cifrados_tonales_descripciones = [
        'A'  => 'La',
        'Ab' => 'La bemol',
        'A#' => 'La sostenido',
        'B'  => 'Si',
        'Bb' => 'Si bemol',
        'C'  => 'Do',
        'C#' => 'Do sostenido',
        'D'  => 'Re',
        'Db' => 'Re bemol',
        'D#' => 'Re sostenido',
        'E'  => 'Mi',
        'Eb' => 'Mi bemol',
        'F'  => 'Fa',
        'F#' => 'Fa sostenido',
        'G'  => 'Sol',
        'Gb' => 'Sol bemol',
        'G#' => 'Sol sostenido',
    ];

    public static $armonias_tonales_descripciones = [
        'n' => 'mayor',
        'm' => 'menor',
        // 'aug' => 'aumentado',
        // 'dim' => 'disminuido',
    ];


    // Cifrados Tonales
    
    public static function getCifradosTonalesDescripciones()
    {
        return self::$cifrados_tonales_descripciones;
    }

    public static function getCifradosTonales()
    {
        return array_keys( self::getCifradosTonalesDescripciones() );
    }

    public static function getDescripcionCifradoTonal(string $key)
    {
        return self::getCifradosTonalesDescripciones()[$key];
    }


    // Armonias tonales
    
    public static function getArmoniasTonalesDescripciones()
    {
        return self::$armonias_tonales_descripciones;
    }

    public static function getArmoniasTonales()
    {
        return array_keys( self::getArmoniasTonalesDescripciones() );
    }

    public static function getDescripcionArmoniaTonal(string $key)
    {
        return self::getArmoniasTonalesDescripciones()[$key];
    }


    // Attributes
    
    public function getTonalidadAttribute()
    {
        return implode([
            $this->cifrado_tonal, 
            $this->armonia_tonal
        ]);
    }

    public function getDescripcionTonalidadAttribute()
    {
        return implode(' ', [
            self::getDescripcionCifradoTonal( $this->cifrado_tonal ), 
            self::getDescripcionArmoniaTonal( ($this->armonia_tonal ?? 'n') ),
        ]);
    }
}
