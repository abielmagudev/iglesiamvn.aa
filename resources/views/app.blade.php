<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('images/mvn-favicon-b.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .inputs {
                border: solid 1px #dbdbdc;
                border-radius: .3em;
                padding:0.75rem;
            }
            .has-vertical-middle, tr.has-vertical-middle > td {
                vertical-align: middle;
            }
            .has-text-nowrap {
                white-space: nowrap;
            }
            .is-borderless {
                border:none !important;
            }
            .height-100 {
                height: 100% !important;
            }
            .has-background-purple-bold {
                background: rgb(68,25,85);
                background: linear-gradient(135deg, rgba(68,25,85,1) 13%, rgba(142,43,161,1) 86%);
            }
        </style>
    </head>
    <body style="min-height:100vh;background-color: #ecf0f3;">
        
    @auth
        @include('app.navbar')

        <section class="section">
            
            <div class="container">
                
                @include('app.notificator')

                @yield('content')
                
            </div>
        </section>

        @include('app.modal-buscar-canciones')
        @include('app.js-bulma')
        @include('app.js-chart')
        @include('app.js-clipboard')
        @stack('scripts')

    @else
        @yield('content')

    @endauth
    </body>
</html>
