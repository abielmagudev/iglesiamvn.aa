@extends('app')
@section('content')
<x-card title="Editar cantante">
	<form action="{{ route('cantantes.update', $cantante) }}" method="post" autocomplete="off">
		@include('cantantes._form')
		@method('put')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-warning">Actualizar cantante</button>
			</div>
			<div class="control">
				<a href="{{ route('cantantes.index') }}" class="button is-dark">Regresar</a>			
			</div>
		</div>
	</form>
</x-card>
<br>

<div class="field is-grouped is-justify-content-flex-end">
	<div class="control">
		<x-modal-trigger modal-id="confirmarEliminar" class="button is-danger is-outlined is-borderless">Eliminar cantante</x-modal-trigger>
	</div>
</div>
<x-modal id="confirmarEliminar">
	<div class="has-text-centered">	
		<p class="title">Atención</p>
		<p>¿Deseas eliminar el cantante <b>"{{ $cantante->nombre }}"</b>?</p>
		<br>
		<form action="{{ route('cantantes.destroy', $cantante) }}" method="post">
			@csrf
			@method('delete')
			<button class="button is-danger is-outlined" type="submit">Si, eliminar cantante</button>
			<button class="button is-dark button-modal-close" type="button">Cancelar</button>
		</form>
	</div>
</x-modal>
@endsection
