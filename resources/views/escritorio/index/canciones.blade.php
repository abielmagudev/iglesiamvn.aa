{{-- Contadores de Canciones --}}
<div class="columns">
	<div class="column">
		<div class="box has-text-centered">
			<div class="heading">Canciones</div>
			<div class="title">{{ $canciones->count() }}</div>
		</div>
	</div>
	<div class="column">
		<div class="box has-text-centered">
			<div class="heading">Repertorio</div>
			<div class="title">{{ $canciones->where('estatus', 'repertorio')->count() }}</div>
		</div>
	</div>
	<div class="column">
		<div class="box has-text-centered">
			<div class="heading">Improvisada</div>
			<div class="title">{{ $canciones->where('estatus', 'improvisada')->count() }}</div>
		</div>
	</div>
	<div class="column">
		<div class="box has-text-centered">
			<div class="heading">Propuesta</div>
			<div class="title">{{ $canciones->where('estatus', 'propuesta')->count() }}</div>
		</div>
	</div>
</div>
