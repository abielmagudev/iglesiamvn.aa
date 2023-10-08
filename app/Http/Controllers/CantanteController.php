<?php

namespace App\Http\Controllers;

use App\Http\Requests\CantanteSaveRequest;
use App\Models\Cantante;
use Illuminate\Http\Request;

class CantanteController extends Controller
{
    public function index()
    {
        return view('cantantes.index', [
            'cantantes' => Cantante::orderByDesc('id')->paginate(25),
        ]);
    }

    public function create()
    {
        return view('cantantes.create')->with('cantante', new Cantante);
    }

    public function store(CantanteSaveRequest $request)
    {
        if(! $cantante = Cantante::create( $request->validated() ) )
            return back()->with('danger', 'Error al guardar el nuevo cantante, intenta nuevamente...');

        return redirect()->route('cantantes.index')->with('success', "Cantante <b>\"{$cantante->nombre}\"</b> guardado");
    }

    public function show(Cantante $cantante)
    {
        return view('cantantes.show', [
            'cantante' => $cantante,
        ]);
    }

    public function edit(Cantante $cantante)
    {
        return view('cantantes.edit')->with('cantante', $cantante);

    }

    public function update(CantanteSaveRequest $request, Cantante $cantante)
    {
        if(! $cantante->fill( $request->validated() )->save() )
            return back()->with('danger', 'Error al actualizar el cantante, intenta nuevamente...');

        return redirect()->route('cantantes.edit', $cantante)->with('success', "Cantante <b>\"{$cantante->nombre}\"</b> actualizado");
    }

    public function destroy(Cantante $cantante)
    {
        if(! $cantante->delete() )    
            return back()->with('danger', 'Error al eliminar el cantante, intenta nuevamente...');

        return redirect()->route('cantantes.index')->with('success', "Cantante <b>\"{$cantante->nombre}\"</b> eliminado");
    }
}
