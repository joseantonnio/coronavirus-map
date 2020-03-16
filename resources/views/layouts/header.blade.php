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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ secure_asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ secure_asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ secure_asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ secure_asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ secure_asset('images/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#272b30">

    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
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
                            <a class="nav-link" href="{{ route('news') }}">
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
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="bottom" title="Em breve">
                                <span data-feather="alert-circle"></span>
                                Realizar correção
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
                            <a class="nav-link" href="#"  data-toggle="tooltip" data-placement="bottom" title="Em breve! Fale comigo no Twitter @JunnyKx">
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
                                    <span class="text-success" data-feather="smile"></span>
                                    {{ $infections->total_recovered }} recuperações
                                </span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link" style="cursor: default;">
                                    <span class="text-dark" data-feather="frown"></span>
                                    {{ $infections->total_deaths }} mortes
                                </span>
                            </li>
                            @if (isset($last_update))
                                <li class="nav-item">
                                    <span class="nav-link" style="cursor: default;" data-toggle="tooltip" data-placement="bottom" title="Última alteração">
                                        <span class="text-info" data-feather="clock"></span>
                                        {{ $last_update }}
                                    </span>
                                </li>
                            @endif
                        </ul>
                    @endif
                </div>
            </nav>