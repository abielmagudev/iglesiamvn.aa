@extends('app')
@section('content')
<x-card title="Cantante">
	<x-slot name="options">
		<a href="{{ route('cantantes.edit', $cantante) }}" class="button is-warning">
			<span class="icon">
				<i class="fa-solid fa-pen-to-square"></i>
			</span>
		</a>
	</x-slot>

	<p>
		<small class="has-text-grey">Nombre</small>
		<br>
		<b>{{ $cantante->nombre }}</b>
	</p>
	<br>

	<p>
		<small class="has-text-grey">Notas</small>
		<br>
		<span>{{ $cantante->notas }}</b>
	</p>
</x-card>
@endsection
