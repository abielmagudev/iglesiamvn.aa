<x-card title="Interpretes: {{ $cantantes->count() }}">
	@if( $cantantes->count() )
	<x-table class="is-hoverable">
		<x-slot name="thead">
			<tr>
				<th>Nombre</th>
				<th>Canciones</th>
				<th></th>
			</tr>
		</x-slot>
		@foreach($cantantes as $cantante)
		<tr class="has-vertical-middle">
			<td class="has-text-nowrap" style="width:1%">{{ $cantante->nombre }}</td>
			<td class="py-5">
				<progress class="progress is-primary" value="{{ $cantante->canciones->count() }}" max="{{ $canciones->count() }}"></progress>
			</td>
			<td class="has-text-nowrap" style="width:1%">{{ $cantante->canciones->count() }}</td>
		</tr>
		@endforeach
	</x-table>
	@endif
</x-card>
<br>
