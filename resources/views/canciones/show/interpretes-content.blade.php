<div id="interpretes" @class(['is-hidden' => $tab <> 'interpretes'])>
	<x-card title="Intérpretes">

		<x-slot name="options">
			<a href="{{ route('interpretes.create', $cancion) }}" class="button is-link is-inverted">Agregar intérprete</a>
		</x-slot>

		@if( $cancion->interpretes->count() )
		<x-table>
			<x-slot name="thead">
			<tr class="has-vertical-middle">
				<th>Nombre</th>
				<th>Tonalidad</th>
				<th>Notas</th>
				<th></th>
			</tr>
			</x-slot>

			@foreach($cancion->interpretes as $cantante)
			<tr class="has-vertical-middle">
				<td>{{ $cantante->nombre }}</td>
				<td>
					<span>{{ $cantante->pivot->descripcion_tonalidad }}</span>
					<span>( {{ $cantante->pivot->tonalidad }} )</span>
				</td>
				<td>{{ $cantante->pivot->notas }}</td>
				<td class="has-text-right">
					<a href="{{ route('interpretes.edit', [$cancion, $cantante]) }}" class="button is-warning is-outlined has-text-dark">
						<span class="icon has-text-dark">
							<i class="fa-solid fa-pen-to-square"></i>
						</span>
					</a>
				</td>
			</tr>
			@endforeach
		</x-table>
		@endif
	</x-card>
</div>
