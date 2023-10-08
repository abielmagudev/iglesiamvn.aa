@extends('app')
@section('content')
@include('canciones.show.header', ['cancion' => $cancion])
<br>
<x-card title="Agregar version">
	<form action="{{ route('versiones.store', $cancion) }}" method="post" autocomplete="off">
		@include('versiones._form', ['version' => $version])
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-success">Guardar version</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.show', [$cancion, 'tab' => 'versiones']) }}" class="button is-dark">Cancelar</a>			
			</div>
		</div>
	</form>
</x-card>
@endsection
