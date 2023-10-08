<div class="card {{ $attributes->get('class', '') }}" style="{{ $attributes->get('style', '')  }}">
	@if( $attributes->has('title') || isset($options) )
	<div class="card-header">
		<div class="card-header-title">
			<span class="is-size-5">{{ $attributes->get('title', '') }}</span>
		</div>

		@isset($options)
		<div class="is-align-self-center py-2 mr-4">
			{!! $options !!}
		</div>
		@endisset
	</div>
	@endif

	<div class="card-content">
		{{ $slot }}
	</div>
</div>
