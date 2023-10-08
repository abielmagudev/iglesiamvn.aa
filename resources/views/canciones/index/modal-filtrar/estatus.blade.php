<div class="field">
	<label for="selectEstatus" class="label">Estatus</label>
	<x-form.select class="is-fullwidth" name="estatus">
		<option selected label="- Cualquier estatus -"></option>
		@foreach($estatus_descripciones as $estatus => $descripcion)
		<option value="{{ $estatus }}" {{ isSelected($estatus == request('estatus')) }}>{{ ucfirst($estatus) }} - {{ $descripcion }}</option>
		@endforeach
	</x-select>
</div>
