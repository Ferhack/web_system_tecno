<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema para Asociacion de Comerciantes 4 de Octubre</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/layouts/sidebar.js') }}" defer></script>
    <script src="{{ asset('js/switch.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link href="{{ asset('css/layouts/sidebar.css') }}" rel="stylesheet">

    <!-- CHARTJS SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="app">
        @auth
            @include('layouts.partials.navbar')
        @endauth
        <main>
            @auth
                @include('layouts.partials.sidebar')
            @endauth
            @yield('content')
        </main>
        <footer id="footer" class="site-footer dark-skin dark-widgetized-area">
            <div id="site-info" class="site-info site-info-layout-2">
                <div class="container">
                    <div class="tie-row">
                        <div class="tie-col-md-12">
                            <p>Cantidad de Vistas: <?php echo $x ?? 0; ?></p>
                            <div class="copyright-text copyright-text-first">© Copyright 2021, Todos los derechos
                                reservados</div>
                            </li>
                            <li id="menu-item-1239"><a href="mailto:grupo14sc@tecnoweb.org.bo">Contáctanos con un
                                    correo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
