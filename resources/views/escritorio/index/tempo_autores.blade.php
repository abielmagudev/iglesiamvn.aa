<div class="columns">

	{{-- Indicadores tempo --}}
	<div class="column">
		<x-card title="Indicadores de tempo">
			<div class="is-flex is-justify-content-center">
				<?php $setup = [

					'datasets' => [
						[
							'label' => ' Canciones',
							'data' => [
								$canciones->where('indicador_tempo', 'alegre')->count(),
								$canciones->where('indicador_tempo', 'moderado')->count(),
								$canciones->where('indicador_tempo', 'lento')->count(),
							],
							'backgroundColor' => [
								'#24D160',
								'#FEDE58',
								'#1D9BEE',
							],
						]
					],
					'labels' => [
						"Alegre: {$canciones->where('indicador_tempo', 'alegre')->count()}",
						"Moderado: {$canciones->where('indicador_tempo', 'moderado')->count()}",
						"Lento: {$canciones->where('indicador_tempo', 'lento')->count()}"
					],

				] ?>
				<canvas id="pieIndicadoresTempo" data-chart-setup="{{ json_encode($setup) }}"><canvas>
			</div>
		</x-card>
	</div>

	{{-- Autores --}}
	<div class="column">
		<x-card title="Autores" class="height-100">
			@if( $canciones->count() )
			<div style="max-height:350px; overflow-y: scroll;">
				<x-table class="is-hoverable">

					<x-slot name="thead">
					<tr>
						<th>Nombre</th>
						<th>Canciones</th>
					</tr>
					</x-slot>

					<?php $autores = $canciones->groupBy('autor')->sortByDesc(function ($canciones, $autor) {
						return count($canciones);
					}) ?>

					@foreach($autores as $autor => $canciones)
					<tr>
						<td>{{ $autor }}</td>
						<td>{{ count($canciones) }}</td>
					</tr>
					@endforeach

				</x-table>
			</div>
			@endif
		</x-card>
	</div>
</div>
