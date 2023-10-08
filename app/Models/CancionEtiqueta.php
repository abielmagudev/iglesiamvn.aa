<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CancionEtiqueta extends Pivot
{
    protected $table = 'cancion_etiqueta';
}
