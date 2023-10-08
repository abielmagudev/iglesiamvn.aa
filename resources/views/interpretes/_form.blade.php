<div class="field">
  <label class="label" for="selectCantante">Cantante</label>
  <x-form.select class="is-fullwidth" id="selectCantante" name="cantante" required>
    <option disabled selected label="Selecciona..."></option>
    
    @foreach($cantantes as $cantante)
    <option value="{{ $cantante->id }}" {{ isSelected(old('cantante', $interprete->id) == $cantante->id) }}>{{ $cantante->nombre }}</option>
    @endforeach

  </x-form.select>
  <x-error name="cantante" />
</div>

<div class="field">
  <label class="label" for="selectCifradoTonal">Tonalidad</label>
  <div class="columns">

    <div class="column">
      <x-form.select class="is-fullwidth" id="selectCifradoTonal" name="cifrado_tonal" required>        
        
        <optgroup label="Cifrado tonal">

        @foreach($cifrados_tonales_descripciones as $cifrado_tonal => $descripcion)
          <?php $selected = old('cifrado_tonal', ($interprete->pivot->cifrado_tonal ?? null)) == $cifrado_tonal ?>
          <option value="{{ $cifrado_tonal }}" {{ isSelected( $selected ) }}>{{ $descripcion }} ( {{ $cifrado_tonal }} )</option>
        @endforeach

        </optgroup>

      </x-form.select>
      <x-error name="cifrado_tonal" />
    </div>

    <div class="column">
      <x-form.select class="is-fullwidth" id="selectArmoniaTonal" name="armonia_tonal" required>        
        <optgroup label="Armonía tonal">

        @foreach($armonias_tonales_descripciones as $armonia_tonal => $descripcion)
          <?php $selected = old('armonia_tonal', ($interprete->pivot->armonia_tonal ?? null)) == $armonia_tonal ?>
          <option value="{{ $armonia_tonal }}" {{ isSelected( $selected ) }}>{{ ucfirst($descripcion) }} <?= $armonia_tonal <> 'n' ? "( {$armonia_tonal} )" : '' ?></option>
        @endforeach

        </optgroup>
      </x-form.select>
      <x-error name="armonia_tonal" />
    </div>

  </div>
</div>

<div class="field">
  <label class="label" for="textareaNotas">Notas</label>
  <x-form.textarea id="textareaNotas" name="notas"  placeholder="(Opcional) Algúna información ó dato adicional importante...">{{ old('notas', ($interprete->pivot->notas ?? null)) }}</x-form.textarea>
  <x-error name="notas" />
</div>

<input type="hidden" name="cancion_id" value="{{ $cancion->id }}">
@csrf
