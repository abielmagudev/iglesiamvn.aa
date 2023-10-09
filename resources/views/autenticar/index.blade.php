@extends('app')
@section('content')
<div class="has-background-purple-bold">
    <div class="hero is-fullheight">
        <div class="hero-body is-justify-content-center">

            <div id="wrapper">         
                @if( $errors->any() )
                <div class="notification is-danger has-text-centered">
                    <strong>Usuario ó contraseña incorrectos</strong>
                </div>
                @endif

                <div class="box has-text-centered pb-5" style="width:100%;max-width:400px;">
                    <div class="title">
                        <img src="{{ asset('images/mvn-favicon-b.png') }}" width="92" height="92" />
                    </div>
        
                    <form action="{{ route('autenticar.attempt') }}" method="post" autocomplete="off">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" name="usuario" value="{{ old('usuario') }}" placeholder="Usuario" required autofocus />
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input type="password" class="input" name="contrasena" placeholder="Contraseña" required />
                            </div>
                        </div>
                        <button class="button is-primary is-fullwidth">
                            <b>ENTRAR</b>
                        </button>
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>   
</div>
@endsection