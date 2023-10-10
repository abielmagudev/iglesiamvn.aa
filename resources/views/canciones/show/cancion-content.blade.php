<div id="cancion" @class(['is-hidden' => $tab <> 'cancion'])>
	<div class="columns">

		{{-- LETRA --}}
		<div class="column">
			<x-card title="Letra" class="height-100">

				<x-slot name="options">
					<button class="button is-link is-outlined clipboard" data-clipboard-target="#letraCancion">
						<span class="icon">
							<i class="fa-solid fa-copy"></i>
						</span>
						<span>Copiar</span>
					</button>
				</x-slot>

				<div id="letraCancion" class="is-size-5">
					{!! nl2br($cancion->letra) !!}
				</div>

			</x-card>
		</div>

		{{-- INFORMACION --}}
		<div class="column">
			<x-card title="Información" class="height-100">

				<x-slot name="options">
					<a href="{{ route('canciones.edit', $cancion) }}" class="button is-warning">
						<span class="icon">
							<i class="fa-solid fa-pen-to-square"></i>
						</span>
						<span>Editar</span>
					</a>
				</x-slot>

				<p>
					<small class="has-text-grey">Estatus</small>
					<br>
					<b class="is-capitalized">{{ $cancion->estatus }}</b>
					<span>- {{ $cancion->descripcion_estatus }}</span>
				</p>
				<br>
				
				<p>
					<small class="has-text-grey">Título y autor</small>
					<br>
					<b>{{ $cancion->titulo }}</b>
					<span>- {{ $cancion->autor }}</span>
				</p>
				<br>

				<p>
					<small class="has-text-grey">Indicador de tempo</small>
					<br>
					<b class="is-capitalized">{{ $cancion->indicador_tempo }}</b>
					<span>- {{ $cancion->descripcion_indicador_tempo }}</span>
				</p>
				<br>

				<p>
					<small class="has-text-grey">URL de referencia</small>
					<br>
					@if( $cancion->tieneUrlReferencia() )
					<a href="{{ $cancion->url_referencia }}" target="_blank">Enlace de {{ $cancion->plataforma_url_referencia }}</a>
					@endif
				</p>
				<br>

				<p>
					<small class="has-text-grey">Etiquetas</small>
					<br>
					@foreach($cancion->etiquetas as $etiqueta)
					<a href="{{ route('canciones.index', ['etiquetas' => $etiqueta]) }}" class="tag is-light">{{ $etiqueta->nombre }}</a>
					@endforeach
				</p>
				<br>

				<p>
					<small class="has-text-grey">Notas</small>
					<br>
					<span>{{ $cancion->notas }}</span>
				</p>
			</x-card>
		</div>
	</div>
</div>
