<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Cantante;
use App\Models\Etiqueta;
use App\Models\Version;
use Illuminate\Http\Request;

class EscritorioController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('escritorio.index', [
            'canciones' => Cancion::all(),
            'cantantes' => Cantante::with('canciones')->get(),
            'etiquetas' => Etiqueta::withCount('canciones')->get()->sortByDesc('canciones_count'),
        ]);
    }
}
