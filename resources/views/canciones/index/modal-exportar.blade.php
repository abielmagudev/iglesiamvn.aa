<x-modal id="modalExportarCanciones">
	<p class="title">Exportar canciones</p>
	<p class="subtitle">Se exportará la lista actual</p>
	<form action="{{ route('canciones.exportar') }}" method="post">
		@csrf
		@foreach(request()->all() as $input => $value)
		<input type="hidden" name="{{ $input }}" value="{{ $value }}">
		@endforeach
		<div class="field is-grouped is-grouped-centered">
			<div class="control is-flex-grow-1">
				<button class="button is-success is-fullwidth" name="formato" value="excel">EXCEL</button>
			</div>
			<div class="control is-flex-grow-1 is-hidden">
				<button class="button is-success is-fullwidth" name="formato" value="pdf">PDF</button>
			</div>
		</div>
	</form>
</x-modal>
