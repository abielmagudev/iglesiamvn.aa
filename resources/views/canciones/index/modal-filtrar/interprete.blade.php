<div class="field">
	<label for="selectInterprete" class="label">Intérprete</label>
	<x-form.select id="selectInterprete" class="is-fullwidth" name="interprete">
		<option label="- Cualquier intérprete -"></option>
		
		@foreach($cantantes as $cantante)
		<option value="{{ $cantante->id }}" {{ isSelected($cantante->id == request('interprete')) }}>{{ $cantante->nombre }}</option>
		@endforeach

	</x-select>
</div>
