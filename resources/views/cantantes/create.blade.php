@extends('app')
@section('content')
<x-card title="Nuevo cantante">
	<form action="{{ route('cantantes.store') }}" method="post" autocomplete="off">
		@include('cantantes._form')
		<br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">	
				<button class="button is-success">Guardar cantante</button>
			</div>
			<div class="control">
				<a href="{{ route('cantantes.index') }}" class="button is-dark">Cancelar</a>			
			</div>
		</div>
	</form>
</x-card>
@endsection
