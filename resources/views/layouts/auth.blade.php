<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-gray-100 font-sans">
        <div id="app">

            @include('partials.app._navbar')

            <div class="py-4 container w-3/5 mt-4">

                @yield('content')

            </div>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
