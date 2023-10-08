<div class="field">
  <label class="label" for="inputUrlReferencia">URL de referencia</label>
  <x-form.input id="inputUrlReferencia" type="url" name="url_referencia" :value="old('url_referencia', $version->url_referencia)" placeholder="Dirección de YouTube, Spotify..." required/>
  <x-error name="url_referencia" />
</div>

<div class="field">
  <label class="label" for="textareaNotas">Notas</label>
  <x-form.textarea id="textareaNotas" name="notas" placeholder="(Opcional) Algúna información ó dato adicional importante...">{{ old('notas', $version->notas) }}</x-form.textarea>
  <x-error name="notas" />
</div>

@csrf
