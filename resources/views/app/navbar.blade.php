<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <div class="navbar-item">
        <img src="{{ asset('images/mvn-favicon-b.png') }}" width="28" height="28" class="mr-2">
      </div>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="{{ route('escritorio.index') }}">Escritorio</a>
        <a class="navbar-item" href="{{ route('canciones.index') }}">Canciones</a>
        <a class="navbar-item" href="{{ route('cantantes.index') }}">Cantantes</a>
        <a class="navbar-item" href="{{ route('usuarios.index') }}">Usuarios</a>
        <x-modal-trigger class="navbar-item" modal-id="modalBuscarCanciones" link>Buscar</x-modal-trigger>
      </div>
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons is-justify-content-flex-end">
            <a class="button is-white" href="{{ route('autenticado.edit') }}">
              <span class="icon">
                <i class="fa-solid fa-circle-user"></i>
              </span>
              <span>{{ auth()->user()->name }}</span>
            </a>
            <div class="is-hidden-desktop is-clearfix"></div>
            <a class="button is-danger" href="{{ route('autenticar.logout') }}">
              <span>Salir</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
