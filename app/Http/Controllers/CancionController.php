<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancionSaveRequest;
use App\Models\Cancion;
use App\Models\CancionCantante;
use App\Models\Cantante;
use Illuminate\Http\Request;

class CancionController extends Controller
{
    public function index(Request $request)
    {
        $canciones = Cancion::orderByDesc('id')
                            ->filtros($request)
                            ->paginate(25)
                            ->appends($request->query());

        return view('canciones.index', [
            'request' => $request,
            'canciones' => $canciones,
            'cantantes' => Cantante::orderBy('nombre')->get(),
            'estatus_descripciones' => Cancion::getEstatusDescripciones(),
            'indicadores_tempo_descripciones' => Cancion::getIndicadoresTempoDescripciones(),
        ]);
    }

    public function create()
    {
        return view('canciones.create', [
            'cancion' => new Cancion,
            'autores' => Cancion::distinct()->pluck('autor'),
            'estatus_descripciones' => Cancion::getEstatusDescripciones(),
            'indicadores_tempo_descripciones' => Cancion::getIndicadoresTempoDescripciones(),
        ]);
    }

    public function store(CancionSaveRequest $request)
    {
        if(! $cancion = Cancion::create( $request->validated() ) )
            return back()->with('danger', 'Error al guardar la nueva canción, intenta nuevamente...');

        $this->sincronizarEtiquetas($request, $cancion);

        return redirect()->route('canciones.index')->with('success', "Canción <b>\"{$cancion->titulo}\"</b> guardada");
    }

    public function show(Cancion $cancion, Request $request)
    {
        $tab = in_array($request->get('tab'), ['cancion','interpretes','versiones'])
             ? $request->get('tab')
             : 'cancion';

        return view('canciones.show', [
            'cancion' => $cancion,
            'tab' => $tab,
        ]);
    }

    public function edit(Cancion $cancion)
    {
        return view('canciones.edit', [
            'cancion' => $cancion,
            'autores' => Cancion::distinct()->pluck('autor'),
            'estatus_descripciones' => Cancion::getEstatusDescripciones(),
            'indicadores_tempo_descripciones' => Cancion::getIndicadoresTempoDescripciones(),
        ]);
    }

    public function update(CancionSaveRequest $request, Cancion $cancion)
    {
        if(! $cancion->fill( $request->validated() )->save() )
            return back()->with('danger', 'Error al actualizar la canción, intenta nuevamente...');
        
        $this->sincronizarEtiquetas($request, $cancion);

        return redirect()->route('canciones.edit', $cancion)->with('success', "Canción <b>\"{$cancion->titulo}\"</b> actualizada");
    }

    public function destroy(Cancion $cancion)
    {
        if(! $cancion->delete() )    
            return back()->with('danger', 'Error al eliminar la canción, intenta nuevamente...');

        $this->sincronizarEtiquetas(new Request, $cancion);

        return redirect()->route('canciones.index')->with('success', "Canción <b>\"{$cancion->titulo}\"</b> eliminada");
    }



    // Metodos personalizados
        
    public function sincronizarEtiquetas(Request $request, Cancion $cancion)
    {
        $etiquetaController = new EtiquetaController;

        if( $request->filled('etiquetas') )
        {
            $etiquetas = $etiquetaController->store($request);
            
            $cancion->etiquetas()->sync( 
                $etiquetas->pluck('id')->toArray()
            );
        }

        $etiquetaController->deleteUnused();
    }
}
