<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            @can('user-list')
                                <li><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
                            @endcan
                            @can('role-list')
                                <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                            @endcan
                            @can('permission-list')
                                <li><a class="nav-link" href="{{ route('permissions.index') }}">Permisos</a></li>
                            @endcan
                            @can('empresa-list')
                                <li><a class="nav-link" href="{{ route('empresas.index') }}">Empresas</a></li>
                            @endcan
                            @can('nivel-list')
                                <li><a class="nav-link" href="{{ route('niveles.index') }}">Niveles</a></li>
                            @endcan
                            @can('nivelconocimiento-list')
                                <li><a class="nav-link" href="{{ route('nivelconocimiento.index') }}">nivel de conocimiento</a></li>
                            @endcan
                            @can('tipodocumento-list')
                                <li><a class="nav-link" href="{{ route('tipodocumentos.index') }}">Tipos de documentos</a></li>
                            @endcan
                            @can('documento-list')
                                <li><a class="nav-link" href="{{ route('documento.index') }}">Documentos</a></li>
                            @endcan
                            @can('objetivo-list')
                                <li><a class="nav-link" href="{{ route('objetivo.index') }}">Objetivos</a></li>
                            @endcan
                            <!-- @can('detalle-list')
                                <li><a class="nav-link" href="{{ route('detalle.index') }}">Detalle del documento</a></li>
                            @endcan -->
                            @can('footer-list')
                                <li><a class="nav-link" href="{{ route('footer.index') }}">Footer del documento</a></li>
                            @endcan
                            <!-- @can('pdf-list')
                                <li><a class="nav-link" href="{{ route('pdfs.index') }}">Pdfs</a></li>
                            @endcan -->
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name_f}} {{ Auth::user()->name_s }} {{ Auth::user()->apellido_f }} {{ Auth::user()->apellido_s }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
