<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {{-- incluyo un bloque de codigo creado --}}
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')

        <main class="py-4">
            @yield('content'){{-- a la espera de algun contenido --}}
        </main>
    </div>
</body>
</html>
