<div class="notification is-{{ $attributes->get('color', 'dark') }} {{ $attributes->get('class', '') }}">
	<button class="delete"></button>
	<div class="has-text-centered">{{ $slot }}</div>
</div>
