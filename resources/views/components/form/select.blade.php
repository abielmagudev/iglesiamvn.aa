<div 
{{
	$attributes->merge([
		'class' => $attributes->has('class') ? sprintf('%s %s', $attributes->get('class'), 'select') : 'select'
	])->except(['id', 'name', 'required'])
}} 
>
	<select {{ $attributes->only(['id', 'name', 'required']) }}>
		{!! $slot !!}
	</select>
</div>
