@extends('app')
@section('content')
<x-card title="Usuarios">
    <x-slot name="options">
        <a href="{{ route('usuarios.create') }}" class="button is-link is-inverted">Nuevo usuario</a>
    </x-slot>

    @if( $usuarios->count() )
    <x-table class="is-fullwidth is-hoverable">
        @slot('thead')
        <tr>
            <th>Usuario</th>
            <th class="has-text-nowrap">Correo electrónico</th>
            <th></th>
        </tr>
        @endslot

        @foreach($usuarios as $usuario)
        <tr class="has-vertical-middle">
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td class="has-text-right">
                <a href="{{ route('usuarios.edit', $usuario) }}" class="button is-warning is-outlined has-text-dark">
                    <span class="icon has-text-dark">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </span>
                </a>
            </td>
        </tr>
        @endforeach
    </x-table>

    @endif
</x-card>
@endsection
