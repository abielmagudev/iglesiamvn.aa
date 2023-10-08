@extends('app')
@section('content')
@include('canciones.show.header', ['cancion' => $version->cancion])
<br>
<x-card title="Editar version">
	<form action="{{ route('versiones.update', $version) }}" method="post" autocomplete="off">
		@include('versiones._form', ['version' => $version])
		@method('put')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-warning">Actualizar version</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.show', [$version->cancion, 'tab' => 'versiones']) }}" class="button is-dark">Cancelar</a>			
			</div>
		</div>
	</form>
</x-card>
<br>
<div class="field is-grouped is-justify-content-flex-end">
	<div class="control">
		<x-modal-trigger modal-id="confirmarEliminar" class="button is-danger is-outlined is-borderless">Eliminar version</x-modal-trigger>
	</div>
</div>
<x-modal id="confirmarEliminar">
	<div class="has-text-centered">	
		<p class="title">Atención</p>
		<p>¿Deseas eliminar esta version de canción <b>"{{ $version->cancion->titulo }}"</b>?</p>
		<br>
		<form action="{{ route('versiones.destroy', $version) }}" method="post">
			@csrf
			@method('delete')
			<button class="button is-danger is-outlined" type="submit">Si, eliminar version</button>
			<button class="button is-dark button-modal-close" type="button">Cancelar</button>
		</form>
	</div>
</x-modal>
@endsection
