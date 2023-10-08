<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Cantante;
use App\Models\CancionCantante;
use App\Http\Requests\InterpreteSaveRequest;
use Illuminate\Http\Request;

class InterpreteController extends Controller
{
    public function create(Cancion $cancion)
    {
        return view('interpretes.create', [
            'cancion' => $cancion,
            'cantantes' => Cantante::whereNotIn('id', $cancion->interpretes->pluck('id')->toArray())->get(),
            'interprete' => new CancionCantante,
            'cifrados_tonales_descripciones' => CancionCantante::getCifradosTonalesDescripciones(),
            'armonias_tonales_descripciones' => CancionCantante::getArmoniasTonalesDescripciones(),
        ]);
    }

    public function store(InterpreteSaveRequest $request, Cancion $cancion)
    {
        $this->attachCantante($request, $cancion);

        if(! $cantante = $cancion->interpretes->find($request->cantante) )
            return back()->with('danger', 'Error al agregar intérprete, intenta nuevamente...');

        return redirect()->route('canciones.show', [$cancion, 'tab' => 'interpretes'])->with('success', "Intérprete <b>{$cantante->nombre}</b> agregado");
    }

    public function edit(Cancion $cancion, Cantante $cantante)
    {
        if(! $interprete = $cancion->interpretes->find($cantante->id) )
            return redirect()->route('canciones.show', [$cancion, 'tab' => 'interpretes'])->with('warning', '<b>Intérprete no encontrado</b>');

        return view('interpretes.edit', [
            'cancion' => $cancion,
            'cantantes' => collect([$cantante]),
            'interprete' => $interprete,
            'cifrados_tonales_descripciones' => CancionCantante::getCifradosTonalesDescripciones(),
            'armonias_tonales_descripciones' => CancionCantante::getArmoniasTonalesDescripciones(),
        ]);
    }

    public function update(InterpreteSaveRequest $request, Cancion $cancion, Cantante $cantante)
    {
        $this->detachInterprete($cancion, $cantante);

        $this->attachCantante($request, $cancion);

        if(! $cantante = $cancion->interpretes->find($request->cantante) )
            return back()->with('danger', 'Error al actualizar intérprete, intenta nuevamente...');

        return redirect()->route('interpretes.edit', [$cancion, $cantante])->with('success', "Intérprete <b>{$cantante->nombre}</b> actualizado");
    }

    public function destroy(Cancion $cancion, Cantante $cantante)
    {
        $this->detachInterprete($cancion, $cantante);

        if( $interprete = $cancion->interpretes->find($cantante->id) )
            return back()->with('danger', 'Error al eliminar interprete, intenta nuevamente...');

        return redirect()->route('canciones.show', [$cancion, 'tab' => 'interpretes'])->with('success', "Interprete {$cantante->nomnre} eliminado");
    }



    // Metodos personalizados
    
    public function attachCantante(Request $request, $cancion)
    {
        $cancion->interpretes()->attach([
            $request->cantante => [
                'cifrado_tonal' => $request->cifrado_tonal,
                'armonia_tonal' => $request->armonia_tonal <> 'n' ? $request->armonia_tonal : null,
                'notas' => $request->get('notas'),
            ]
        ]);
    }

    public function detachInterprete(Cancion $cancion, Cantante $cantante)
    {
        $cancion->interpretes()->detach($cantante->id);
    }
}
