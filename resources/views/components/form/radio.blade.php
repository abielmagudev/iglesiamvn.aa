<label class="radio {{ $attributes->has('disabled') ? 'disabled' : '' }}">
    <input type="radio" {{ $attributes }}>
    <span>{{ $slot }}</span>
</label>
