<div class="control">
	<input 
	{{
		$attributes->merge([
			'class' => $attributes->has('class') ? sprintf('%s %s', $attributes->get('class'), 'input') : 'input'
		])
	}} 
	/>
</div>
