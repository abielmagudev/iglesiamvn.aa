<div class="field">
  <label class="label" for="inputEtiquetas">Etiquetas</label>
  <x-form.input id="inputEtiquetas" type="text" name="etiquetas" :value="request('etiquetas', '')" placeholder="- Cualquier etiqueta -"/>
  <small class="has-text-grey">Palabras separadas por coma: fe,amor, ...</small>
</div>
