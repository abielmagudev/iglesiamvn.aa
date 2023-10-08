<x-modal id="modalBuscarCanciones">
	<p class="title">Buscar canciones</p>
	<form action="{{ route('canciones.index') }}" method="get" autocomplete="off">
		@include('canciones.index.modal-filtrar.letra')
		@include('canciones.index.modal-filtrar.etiquetas')
		<br>

		<div class="field is-grouped is-justify-content-flex-end">
			<div class="control">
				<button type="submit" class="button is-success">Buscar canciones</button>
			</div>
			<div class="control">
				<button type="button" class="button is-dark button-modal-close">Cancelar</button>
			</div>
		</div>
	</form>
</x-modal>