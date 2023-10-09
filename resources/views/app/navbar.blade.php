<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <div class="navbar-item">
        <img src="{{ asset('images/mvn-favicon-b.png') }}" width="28" height="28" class="mr-2">
      </div>
 
      <div class="is-relative" style="margin-top:1px;margin-left:56vw">  
        <x-modal-trigger modal-id="modalBuscarCanciones" class="button is-white p-5">
          <span class="icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
        </x-modal-trigger>
      </div>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">

      {{-- LEFT --}}
      <div class="navbar-start">
        <a class="navbar-item" href="{{ route('escritorio.index') }}">Escritorio</a>
        <a class="navbar-item" href="{{ route('canciones.index') }}">Canciones</a>
        <a class="navbar-item" href="{{ route('cantantes.index') }}">Cantantes</a>
        <a class="navbar-item" href="{{ route('usuarios.index') }}">Usuarios</a>
      </div>

      {{-- RIGHT --}}
      <div class="navbar-end">

        <hr class="my-2">

        <x-modal-trigger class="navbar-item is-hidden-touch" modal-id="modalBuscarCanciones" link>
          <span class="icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
          <span>Buscar</span>
        </x-modal-trigger>

        <a class="navbar-item" href="{{ route('autenticado.edit') }}">
          <span class="icon">
            <i class="fa-solid fa-circle-user"></i>
          </span>
          <span>{{ auth()->user()->name }}</span>
        </a>

        <a class="navbar-item has-background-danger has-text-white" href="{{ route('autenticar.logout') }}">
          <span class="icon">
            <i class="fa-solid fa-right-from-bracket"></i>
          </span>
          <span>Salir</span>
        </a>  
      </div>

    </div>
  </div>
</nav>
