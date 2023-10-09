<div class="field">
    <label for="inputCorreoElectronico" class="label">Correo electrónico</label>
    <div class="control">
        <x-form.input type="email" id="inputCorreoElectronico" name="email" :value="old('email', $usuario->email)" placeholder="Recibir notificaciones de la aplicación..."  required/>
    </div>
    <x-error name="email" />
</div>
<div class="field">
    <label for="inputUsuario" class="label">Usuario</label>
    <div class="control">
        <x-form.input type="text" id="inputUsuario" name="name" :value="old('name', $usuario->name)" placeholder="Iniciar sesión en la aplicación..." required />
    </div>
    <x-error name="name">Mínimo 6 caractéres, entre letras, números, puntos(.) y guíon bajo (_)</x-error>
</div>
<div class="field">
    <label for="passwordContrasena" class="label">Contraseña</label>
    <div class="control">
        <x-form.input type="password" id="passwordContrasena" class="input" name="password" placeholder="Ignorar para mantener la contraseña actual..." />
    </div>
    <x-error name="password"></x-error>
</div>
<div class="field">
    <label for="passwordConfirmarContrasena" class="label">Confirmar contraseña</label>
    <div class="control">
        <x-form.input type="password" id="passwordConfirmarContrasena" class="input" name="password_confirmation" placeholder="Reescribe la nueva contraseña..." />
    </div>
    <x-error name="password_confirmation"></x-error>
</div>
@csrf
