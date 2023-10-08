<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\CancionEtiqueta;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function store(Request $request)
    {
        $etiquetas_peticion = Etiqueta::generarCsvArray($request->etiquetas);

        $nuevas_etiquetas = array_diff($etiquetas_peticion,

            // Obtiene las etiquetas existentes para compararlas con la petición
            Etiqueta::whereIn('nombre', $etiquetas_peticion)->pluck('nombre')->toArray()

        );

        foreach($nuevas_etiquetas as $nueva_etiqueta)
        {
            Etiqueta::create([
                'nombre' => $nueva_etiqueta
            ]);
        }

        return Etiqueta::whereIn('nombre', $etiquetas_peticion)->get();
    }

    public function destroy(Etiqueta $etiqueta)
    {
        return $etiqueta->delete();
    }

    public function destroyMass(Collection $etiquetas)
    {
        $etiquetas_id = $etiquetas->pluck('id')->toArray();

        return Etiqueta::whereIn('id', $etiquetas_id)->delete();
    }


    // Metodos personalizados
    
    public function deleteUnused()
    {
        $canciones_etiquetas = CancionEtiqueta::all();

        $this->destroyMass(
            Etiqueta::whereNotIn('id', $canciones_etiquetas->pluck('etiqueta_id')->toArray())->get()
        );
    }
}
