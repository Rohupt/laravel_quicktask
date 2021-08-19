<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {overflow-x: hidden}
    </style>
    @yield('links')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    Laravel Quicktask
                </a>

                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="nav-item"><a class="nav-link" href={{ route('collections.index') }}>{{ __('Collections') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href={{ route('words.index') }}>{{ __('Words') }}</a></li>
                </ul>

                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        @yield('navbars')

        <main class="py-4">
            @yield('content')
        </main>

        <footer>

        </footer>

        @yield('scripts')
    </div>
</body>
</html>
