@extends('app')
@section('content')
<x-card title="Editar canción">
	<form action="{{ route('canciones.update', $cancion) }}" method="post">
		@include('canciones._form')
		@method('put')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-warning">Actualizar canción</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.show', $cancion) }}" class="button is-dark">Regresar</a>			
			</div>
		</div>
	</form>
</x-card>
<br>

<div class="field is-grouped is-justify-content-flex-end">
	<div class="control">
		<x-modal-trigger modal-id="confirmarEliminar" class="button is-danger is-outlined is-borderless">Eliminar canción</x-modal-trigger>
	</div>
</div>
<x-modal id="confirmarEliminar">
	<div class="has-text-centered">	
		<p class="title">Atención</p>
		<p>¿Deseas eliminar la canción <b>"{{ $cancion->titulo }}"</b>?</p>
		<br>
		<form action="{{ route('canciones.destroy', $cancion) }}" method="post">
			@csrf
			@method('delete')
			<div class="field is-grouped is-grouped-centered">
				<div class="control">
					<button class="button is-danger is-outlined" type="submit">Si, eliminar canción</button>
				</div>
				<div class="control">
					<button class="button is-dark button-modal-close" type="button">Cancelar</button>
				</div>
			</div>
		</form>
	</div>
</x-modal>
@endsection
