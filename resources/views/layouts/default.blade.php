<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary Meta Tags -->
    <title>Mapa do Coronavírus no Brasil - Conheça as cidades afetadas</title>
    <meta name="title" content="Mapa do Coronavírus no Brasil - Conheça as cidades afetadas">
    <meta name="description" content="Tenha em suas mãos mapa do Brasil com todas as áreas e municípios afetados pela doença. Navegue, acompanhe e contribua em tempo real!">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="Mapa do Coronavírus no Brasil - Conheça as cidades afetadas">
    <meta property="og:description" content="Tenha em suas mãos mapa do Brasil com todas as áreas e municípios afetados pela doença. Navegue, acompanhe e contribua em tempo real!">
    <meta property="og:image" content="{{ secure_asset('images/cover.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="Mapa do Coronavírus no Brasil - Conheça as cidades afetadas">
    <meta property="twitter:description" content="Tenha em suas mãos mapa do Brasil com todas as áreas e municípios afetados pela doença. Navegue, acompanhe e contribua em tempo real!">
    <meta property="twitter:image" content="{{ secure_asset('images/cover.jpg') }}">

    <link rel="canonical" href="{{ env('APP_URL') }}">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#272b30">

    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61838464-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-61838464-3');
    </script>

</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-lg-2 col-md-3 col-sm-12 mr-0" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <button class="nav-link btn btn-link" id="menu-toggle"><span data-feather="menu"></span></a>
            </li>
        </ul>
        <input class="form-control form-control-dark w-90 m-2" type="text" id="search" placeholder="Buscar por cidade" aria-label="Buscar por cidade">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <button class="nav-link btn btn-link" data-toggle="modal" data-target=".modal-news"><span data-feather="bell"></span></a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-lg-2 col-md-3 bg-light sidebar" id="sidebar-wrapper">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() != 'home' ?: 'active' }}" href="{{ route('home') }}">
                                <span data-feather="map-pin"></span>
                                Mapa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() != 'data' ?: 'active' }}" href="{{ route('data') }}">
                                <span data-feather="database"></span>
                                Dados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">
                                <span data-feather="globe"></span>
                                Notícias
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Contribuir</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contribute') }}">
                                <span data-feather="alert-circle"></span>
                                Enviar atualização
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Em breve">
                                <span data-feather="x-octagon"></span>
                                Informar um erro
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Fale Conosco</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="https://t.me/mapadocoronavirus" target="_blank">
                                <span data-feather="message-circle"></span>
                                Chat no Telegram
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.linkedin.com/in/joseantonnio/" target="_blank">
                                <span data-feather="mail"></span>
                                Contato
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('coffee') }}" target="_blank">
                                <span data-feather="coffee"></span>
                                Me pague um café
                            </a>
                        </li>
                    </ul>

                    @if (isset($infections))

                        <h6 class="sidebar-heading justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Estatísticas</span>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <span class="nav-link" style="cursor: default;">
                                    <span class="text-warning" data-feather="activity"></span>
                                    {{ $infections->total_cases }} casos
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" style="cursor: default;">
                                    <span class="text-danger" data-feather="alert-triangle"></span>
                                    {{ $infections->total_serious }} casos graves
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" style="cursor: default;">
                                    <span class="text-success" data-feather="sun"></span>
                                    {{ $infections->total_recovered }} recuperações
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" style="cursor: default;">
                                    <span class="text-dark" data-feather="moon"></span>
                                    {{ $infections->total_deaths }} mortes
                                </span>
                            </li>
                            @if (isset($last_update))
                                <li class="nav-item">
                                    <span class="nav-link" style="cursor: default;" data-toggle="tooltip" data-placement="bottom" title="Última atualização de dados">
                                        <span class="text-info" data-feather="clock"></span>
                                        {{ $last_update }}
                                    </span>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </nav>

            <main role="main" class="col-md-9 col-lg-10 ml-sm-auto px-4">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Google Ads -->
    <script data-ad-client="ca-pub-6038882219107054" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
    crossorigin="anonymous"></script>

    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>

    <!-- Leaflet -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <!-- Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.26.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>

    <!-- Loading -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.6/loadingoverlay.min.js" integrity="sha256-CImtjQVvmu/mM9AW+6gYkksByF4RBCeRzXMDA9MuAso=" crossorigin="anonymous"></script>

    <!-- Application -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
    
</body>

</html>