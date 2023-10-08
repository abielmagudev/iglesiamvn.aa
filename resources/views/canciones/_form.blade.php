<div class="columns">

  {{-- Informacion --}}
  <div class="column">

    <div class="field">
      <label class="label" for="inputTitulo">Título</label>
      <x-form.input id="inputTitulo" type="text" name="titulo" :value="old('titulo', $cancion->titulo)" autofocus />
      <x-error name="titulo" />
    </div>

    <div class="field">
      <label class="label" for="inputAutor">Autor ó cantante</label>
      <x-form.input list="autores" id="inputAutor" type="text" name="autor" :value="old('autor', $cancion->autor)" placeholder="(Opcional) Ignorar si el autor ó cantante es desconocido"/>
      <x-error name="autor" />
      @if( count($autores) )
      <datalist id="autores">
        @foreach($autores as $autor)
        <option value="{{ $autor }}">
        @endforeach
      </datalist>
      @endif
    </div>

    <div class="field">
      <label class="label" for="inputUrlReferencia">URL de referencia</label>
      <x-form.input id="inputUrlReferencia" type="url" name="url_referencia" :value="old('url_referencia', $cancion->url_referencia)" placeholder="(Opcional) YouTube, Spotify..."/>
      <x-error name="url_referencia" />
    </div>
    
    <div class="field">
      <label class="label">Indicador de tempo</label>
      <x-form.select name="indicador_tempo" class="is-fullwidth" required>
          @foreach($indicadores_tempo_descripciones as $indicador_tempo => $descripcion)
          <?php $selected = old('indicador_tempo', $cancion->indicador_tempo) == $indicador_tempo ?>
          <option value="{{ $indicador_tempo }}" {{ isSelected($selected) }}>{{ ucfirst($indicador_tempo) }} - {!! $descripcion !!}</option>
          @endforeach
      </x-form.select>
      <x-error name="indicador_tempo" />
    </div>

    <div class="field">
      <label class="label">Estatus</label>
      <x-form.select name="estatus" class="is-fullwidth" required>
          @foreach($estatus_descripciones as $estatus => $descripcion)
          <?php $selected = old('estatus', $cancion->estatus) == $estatus ?>
          <option value="{{ $estatus }}" {{ isSelected($selected) }}>{{ ucfirst($estatus) }} - {!! $descripcion !!}</option>
          @endforeach
      </x-form.select>
      <x-error name="estatus" />
    </div>

    <div class="field">
      <label class="label" for="inputEtiquetas">Etiquetas</label>
      <x-form.input id="inputEtiquetas" type="text" name="etiquetas" :value="old('etiquetas', $cancion->etiquetas->implode('nombre', ','))" placeholder='(Opcional) Solo palabras separadas por coma: fe,amor, ...' />
      <x-error name="etiquetas" />
    </div>

    <div class="field">
      <label class="label" for="textareaNotas">Notas</label>
      <x-form.textarea id="textareaNotas" name="notas"  placeholder="(Opcional) Algúna información ó dato adicional importante...">{{ old('notas', $cancion->notas) }}</x-form.textarea>
      <x-error name="notas" />
    </div>

  </div>

  {{-- Letra --}}
  <div class="column">

    <div class="field" style="height:100%">
      <div class="is-pulled-right">
        <x-error name="letra" />
      </div>
      <label class="label" for="textareaLetra">Letra</label>
      <x-form.textarea id="textareaLetra" name="letra" style="height:95%;">{{ old('letra', $cancion->letra) }}</x-form.textarea>
      <x-error name="letra" />
    </div>

  </div>

</div>

@csrf
