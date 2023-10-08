@extends('app')
@section('content')
<x-card title="Canciones">
	<x-slot name="options">
		<a href="{{ route('canciones.create') }}" class="button is-link is-inverted">Nueva canción</a>

		<x-dropmenu class="is-right">
			<x-slot name="icon">
				<span class="icon">
                	<i class="fa-solid fa-ellipsis-vertical"></i>
            	</span>
			</x-slot>

			<x-modal-trigger class="dropdown-item" modal-id="modalFiltrarCanciones" link>Filtrar</x-modal-trigger>
			<x-modal-trigger class="dropdown-item" modal-id="modalExportarCanciones" link>Exportar</x-modal-trigger>

		</x-dropmenu>
	</x-slot>

	@if( $canciones->count() )
	<x-table class="is-hoverable">
		<x-slot name="thead">
			<tr>
				<th>Título</th>
				<th>Autor</th>
				<th>Letra <span class="has-text-grey-light">(Extracto)</span></th>
				<th class="has-text-nowrap">Indicador de tempo</th>
				<th>Estatus</th>
				<th></th>
			</tr>
		</x-slot>

		@foreach($canciones as $cancion)
		<tr class="has-vertical-middle">
			<td class="has-text-nowrap">{{ $cancion->titulo }}</td>
			<td class="has-text-nowrap">{{ $cancion->autor }}</td>
			<td style="min-width:256px;">
				@if( empty($request->get('letra')) )
				<p>"{{ $cancion->extracto_letra  }}..."</p>
				
				@else
				<p>"{!! $cancion->resaltarExtractoLetra( $request->get('letra') ) !!}..."</p>

				@endif
			</td>
			<td class="is-capitalized">{{ $cancion->indicador_tempo }}</td>
			<td class="is-capitalized">{{ $cancion->estatus }}</td>
			<td class="has-text-right">
				<a href="{{ route('canciones.show', $cancion) }}" class="button is-link is-outlined">
					<span class="icon">
						<i class="fa-solid fa-eye"></i>
					</span>
				</a>
			</td>
		</tr>
		@endforeach
	</x-table>
	@endif
	
</x-card>
<br>

<x-pagination :collection="$canciones" />

@include('canciones.index.modal-filtrar')
@include('canciones.index.modal-exportar')

@endsection
