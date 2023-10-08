<div id="versiones" @class(['is-hidden' => $tab <> 'versiones'])>
	<x-card title="Versiones">

		<x-slot name="options">
		<a href="{{ route('versiones.create', $cancion) }}" class="button is-link is-inverted">Agregar version</a>
		</x-slot>

		@if( $cancion->versiones->count() )
		<x-table>

			<x-slot name="thead">
			<tr>
				<th>Notas</th>
				<th>Referencia</th>
				<th></th>
			</tr>
			</x-slot>

			@foreach($cancion->versiones as $version)
			<tr class="has-vertical-middle">
				<td>{{ $version->notas }}</td>
				<td>
					<a href="{{ $version->url_referencia }}" target="_blank">{{ $version->url_referencia }}</a>
				</td>		
				<td class="has-text-right">
					<a href="{{ route('versiones.edit', $version) }}" class="button is-warning is-outlined">
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
