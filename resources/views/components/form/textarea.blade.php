<textarea 
{{
	$attributes->merge([
		'class' => $attributes->has('class') ? sprintf('%s %s', $attributes->get('class'), 'textarea') : 'textarea'
	])
}} 
>{{ $slot }}</textarea>
