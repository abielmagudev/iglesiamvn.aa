<div class="field">
	<label class="label" for="inputNombre">Nombre</label>
	<x-form.input id="inputNombre" type="text" name="nombre" :value="old('nombre', $cantante->nombre)" autofocus />
	<x-error name="nombre" />
</div>
<div class="field">
	<label class="label" for="textareaNotas">Notas</label>
	<x-form.textarea id="textareaNotas" name="notas" placeholder="(Opcional) Algúna información ó dato adicional importante...">{{ old('notas', $cantante->notas) }}</x-form.textarea>
	<x-error name="notas" />
</div>
@csrf
