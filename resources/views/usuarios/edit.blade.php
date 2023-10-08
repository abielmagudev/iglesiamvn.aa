@extends('app')
@section('content')
<x-card title="Editar usuario">
    <form action="{{ route('usuarios.update', $usuario) }}" method="post" autocomplete="off">
        @include('usuarios._form')
        @method('put')
        <br>
        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <button class="button is-warning">Actualizar usuario</button>
            </div>
            <div class="control">
                <a href="{{ route('usuarios.index') }}" class="button is-dark">Regresar</a>
            </div>
        </div>
    </form>
</x-card>
@include('usuarios._script-rellenar-usuario')
<br>

<div class="field is-grouped is-justify-content-flex-end">
    <div class="control">
        <x-modal-trigger modal-id="confirmarEliminar" class="button is-danger is-outlined is-borderless">Eliminar usuario</x-modal-trigger>
    </div>
</div>
<x-modal id="confirmarEliminar">
    <div class="has-text-centered"> 
        <p class="title">Atención</p>
        <p>¿Deseas eliminar el cantante <b>{{ $usuario->name }}({{ $usuario->email }})</b>?</p>
        <br>
        <form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
            @csrf
            @method('delete')
            <button class="button is-danger is-outlined" type="submit">Si, eliminar usuario</button>
            <button class="button is-dark button-modal-close" type="button">Cancelar</button>
        </form>
    </div>
</x-modal>
@endsection
