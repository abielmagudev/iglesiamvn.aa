<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Cancion\FiltrosTrait;

class Cancion extends Model
{
    use HasFactory;
    use FiltrosTrait;
    
    protected $table = 'canciones';

    protected $fillable = [
        'titulo',
        'autor',
        'url_referencia',
        'indicador_tempo',
        'estatus',
        'notas',
        'letra',
    ];

    public static $indicadores_tempo_descripciones = [
        'alegre' => 'Mínimo 120bmp',
        'moderado' => 'Entre 80bpm - 120bpm',
        'lento' => 'Máximo 80bpm',
    ];

    public static $estatus_descripciones = [
        'propuesta' => 'Próxima a preparar y ensamblar para interpretar',
        'improvisada' => 'Interpretada, pero no preparada ni ensamblada',
        'repertorio' => 'Preparada y ensamblada para interpretar',
    ];

    public static $plataformas_referencia = [
        'youtube' => [
            'youtube.com',
            'youtu.be',
            'y2u.be',
        ],
        'spotify' => [
            'spotify.com',
        ],
    ];


    // Metodos estaticos Indicadores de Tempo
    
    public static function getIndicadoresTempoDescripciones()
    {
        return self::$indicadores_tempo_descripciones;
    }

    public static function getIndicadoresTempo()
    {
        return array_keys( self::getIndicadoresTempoDescripciones() );
    }

    public static function getDescripcionIndicadorTempo(string $indicador_tempo)
    {
        return self::getIndicadoresTempoDescripciones()[$indicador_tempo];
    }



    // Metodos estaticos Estatus
    
    public static function getEstatusDescripciones()
    {
        return self::$estatus_descripciones;
    }

    public static function getEstatus()
    {
        return array_keys( self::getEstatusDescripciones() );
    }

    public static function getDescripcionEstatus(string $estatus)
    {
        return self::getEstatusDescripciones()[$estatus];
    }



    // Attributes

    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = Str::ucfirst( trim($value) );
    }

    public function setAutorAttribute($value)
    {
        $this->attributes['autor'] = Str::title( trim($value) );
    }

    public function getPlataformaUrlReferenciaAttribute()
    {
        foreach(self::$plataformas_referencia as $plataforma => $agujas)
        {
            foreach($agujas as $aguja)
            {
                if( stripos($this->url_referencia, $aguja) !== false )
                    return $plataforma;
            }
        }

        return 'plataforma desconocida';
    }

    public function getDescripcionIndicadorTempoAttribute()
    {
        return self::getDescripcionIndicadorTempo($this->indicador_tempo);
    }

    public function getDescripcionEstatusAttribute()
    {
        return self::getDescripcionEstatus($this->estatus);
    }

    public function getExtractoLetraAttribute()
    {
        return substr($this->letra, 0, 64);
    }

    public function resaltarExtractoLetra(string $frase)
    {
        $letra = preg_match('/á|é|í|ú|ó|ú/', $frase) === 0
               ? str_replace(['á','é','í','ó','ú'], ['a','e','i','o','u'], $this->letra)
               : $this->letra;

        $length = strlen($frase);

        $position = stripos($letra, $frase);

        $original = substr($letra, $position, $length);

        $extracto = substr(
            $letra,
            ($position >= 32 ? ($position - 32) : 0),
            ($length + 64)
        );

        return str_ireplace($frase, "<b class='has-background-success-light has-text-black p-1'>{$original}</b>", $extracto);
    }



    // Validations
    
    public function tieneUrlReferencia()
    {
        return filter_var($this->url_referencia, FILTER_VALIDATE_URL);
    }



    // Relations
    
    public function versiones()
    {
        return $this->hasMany(Version::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class)->using(CancionEtiqueta::class);
    }

    public function interpretes()
    {
        return $this->belongsToMany(Cantante::class)->using(CancionCantante::class)->withPivot([
            'cifrado_tonal',
            'armonia_tonal',
            'notas',
        ]);
    }
}
