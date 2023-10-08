<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $table = 'versiones';

    protected $fillable = [
        'url_referencia',
        'notas',
        'cancion_id',
    ];

    public function cancion()
    {
        return $this->belongsTo(Cancion::class);
    }
}
