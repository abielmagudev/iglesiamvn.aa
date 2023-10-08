<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use App\Models\Version;
use App\Http\Requests\VersionSaveRequest;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function create(Cancion $cancion)
    {
        return view('versiones.create', [
            'cancion' => $cancion,
            'version' => new Version,
        ]);
    }

    public function store(VersionSaveRequest $request, Cancion $cancion)
    {
        if(! $version = Version::create( $request->validated() ) )
            return back()->with('danger', 'Error al guardar version, intenta nuevamente...');

        return redirect()->route('canciones.show', [$cancion, 'tab' => 'versiones'])->with('success', 'Version de canción guardada');
    }

    public function edit(Version $version)
    {
        return view('versiones.edit')->with('version', $version);
    }

    public function update(VersionSaveRequest $request, Version $version)
    {
        if(! $version->fill( $request->validated() )->save() )
            return back()->with('danger', 'Error al actualizar version, intenta nuevamente...');

        return redirect()->route('versiones.edit', $version)->with('success', 'Version de canción actualizada');
    }

    public function destroy(Version $version)
    {
        $cancion = $version->cancion;

        if(! $version->delete() )
            return back()->with('danger', 'Error al eliminar version, intenta nuevamente...');

        return redirect()->route('canciones.show', [$cancion, 'tab' => 'versiones'])->with('success', 'Version de canción eliminada');
    }
}
