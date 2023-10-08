@extends('app')
@section('content')
<x-card title="Nueva canción">
	<form action="{{ route('canciones.store') }}" method="post">
		@include('canciones._form')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-success">Guardar canción</button>
			</div>
			<div class="control">
				<a href="{{ route('canciones.index') }}" class="button is-dark">Cancelar</a>			
			</div>
		</div>
	</form>
</x-card>
@endsection
