<?php

namespace App\Exports;

use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CancionesExport implements FromView
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        return view('canciones.export.excel', [
            'canciones' => Cancion::with('etiquetas')->orderByDesc('titulo')->filtros($this->request)->get(),
        ]);
    }
}
