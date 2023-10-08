<div class="table-container">
	<table class="table is-fullwidth {{ $attributes->get('class', '') }}">
		@isset( $thead )
		<thead>
			{!! $thead !!}
		</thead>
		@endisset

		<tbody>
			{{ $slot }}
		</tbody>
	</table>
</div>
