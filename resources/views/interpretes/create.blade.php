@extends('app')
@section('content')
@include('canciones.show.header', ['cancion' => $cancion])
<br>
<x-card title="Agregar interprete">
	<form action="{{ route('interpretes.store', $cancion) }}" method="post">
		@include('interpretes._form', ['cancion' => $cancion])
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-success">Guardar intérprete</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.show', [$cancion, 'tab' => 'interpretes']) }}" class="button is-dark">Cancelar</a>			
			</div>
		</div>
	</form>
</x-card>
@endsection
