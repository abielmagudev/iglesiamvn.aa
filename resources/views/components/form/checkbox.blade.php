<label class="checkbox {{ $attributes->has('disabled') ? 'disabled' : '' }}">
	<input type="checkbox" {{ $attributes }}>
 	<span>{{ $slot }</span>
</label>
