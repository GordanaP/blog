<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            @include('partials.app._navbar')

            <main class="py-4 container w-4/5">

                @yield('content')

            </main>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
