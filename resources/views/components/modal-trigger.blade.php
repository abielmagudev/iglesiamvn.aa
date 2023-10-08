@if( $attributes->has('link') )
<a href="#!" class="js-modal-trigger {{ $attributes->get('class', '') }}" data-target="{{ $attributes->get('modal-id') }}">{{ $slot }}</a>

@else
<button type="button" class="js-modal-trigger {{ $attributes->get('class', '') }}" data-target="{{ $attributes->get('modal-id') }}">{{ $slot }}</button>

@endif
