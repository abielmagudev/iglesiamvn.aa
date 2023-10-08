@extends('app')
@section('content')
@include('canciones.show.header', ['cancion' => $cancion])
<br>
<x-card title="Editar interprete">
	<form action="{{ route('interpretes.update', [$cancion, $interprete]) }}" method="post">
		@include('interpretes._form', ['cancion' => $cancion])
		@method('put')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-warning">Actualizar intérprete</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.show', [$cancion, 'tab' => 'interpretes']) }}" class="button is-dark">Regresar</a>			
			</div>
		</div>
	</form>
</x-card>
<br>
<div class="field is-grouped is-justify-content-flex-end">
	<div class="control">
		<x-modal-trigger modal-id="confirmarEliminar" class="button is-danger is-outlined is-borderless">Eliminar intérprete</x-modal-trigger>
	</div>
</div>
<x-modal id="confirmarEliminar">
	<div class="has-text-centered">	
		<p class="title">Atención</p>
		<p>¿Deseas eliminar el intérprete <b>"{{ $interprete->nombre }}"</b>?</p>
		<br>
		<form action="{{ route('interpretes.destroy', [$cancion, $interprete]) }}" method="post">
			@csrf
			@method('delete')
			<button class="button is-danger is-outlined" type="submit">Si, eliminar intérprete</button>
			<button class="button is-dark button-modal-close" type="button">Cancelar</button>
		</form>
	</div>
</x-modal>
@endsection
