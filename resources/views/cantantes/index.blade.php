@extends('app')
@section('content')

<x-card title="Cantantes">
	<x-slot name="options">
		<a href="{{ route('cantantes.create') }}" class="button is-link is-inverted">Nuevo cantante</a>
	</x-slot>

	@if( $cantantes->count() )
	<x-table class="is-hoverable">

		<x-slot name="thead">
		<tr>
			<th>Nombre</th>
			<th>Notas</th>
			<th></th>
		</tr>
		</x-slot>

		@foreach($cantantes as $cantante)
		<tr class="has-vertical-middle">
			<td class="has-text-nowrap pr-5" style="width:1%">{{ $cantante->nombre }}</td>
			<td class="has-text-nowrap">{{ $cantante->notas }}</td>
			<td class="has-text-right">
				<a href="{{ route('cantantes.edit', $cantante) }}" class="button is-warning is-outlined">
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
<br>

<x-pagination :collection="$cantantes" />

@endsection
