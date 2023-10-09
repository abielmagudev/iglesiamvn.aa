@extends('app')
@section('content')
<x-card title="Editar mi cuenta">
    <form action="{{ route('autenticado.update') }}" method="post" autocomplete="off">
        @include('usuarios._form-edit')
        @method('put')
        <br>
        <div class="field is-grouped is-grouped-right">
            <div class="control">
                <button class="button is-warning">Actualizar mi cuenta</button>
            </div>
            <div class="control">
                <a href="{{ route('escritorio.index') }}" class="button is-dark">Escritorio</a>
            </div>
        </div>
    </form>
</x-card>
@include('usuarios._script-autollenado-usuario')
@endsection
