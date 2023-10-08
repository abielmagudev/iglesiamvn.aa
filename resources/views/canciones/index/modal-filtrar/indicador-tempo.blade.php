<div class="field">
	<label for="selectIndicadorTempo" class="label">Indicador de tempo</label>
	<x-form.select id="selectIndicadorTempo" class="is-fullwidth" name="indicador_tempo">
		<option label="- Cualquier indicador de tempo -"></option>
		
		@foreach($indicadores_tempo_descripciones as $indicador_tempo => $descripcion)
		<option value="{{ $indicador_tempo }}" {{ isSelected($indicador_tempo == request('indicador_tempo')) }}>{{ ucfirst($indicador_tempo) }} - {{ $descripcion }}</option>
		@endforeach

	</x-select>
</div>
	