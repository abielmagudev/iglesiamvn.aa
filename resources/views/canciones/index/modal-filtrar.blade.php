<x-modal id="modalFiltrarCanciones">
	<p class="title">Filtrar canciones</p>

	<form action="{{ route('canciones.index') }}" method="get" autocomplete="off">
		
		@include('canciones.index.modal-filtrar.letra')
		@include('canciones.index.modal-filtrar.etiquetas')
		@include('canciones.index.modal-filtrar.indicador-tempo')
		@include('canciones.index.modal-filtrar.estatus')
		@include('canciones.index.modal-filtrar.titulo')
		@include('canciones.index.modal-filtrar.autor-cantante')
		@include('canciones.index.modal-filtrar.interprete')

	    <br>
		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">
				<button type="submit" class="button is-success">Filtrar canciones</button>
			</div>
			<div class="control">
				<button type="button" class="button is-dark button-modal-close">Cancelar</button>
			</div>
		</div>

	</form>
</x-modal>
