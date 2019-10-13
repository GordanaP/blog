<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            @include('partials.app._navbar')

            <main class="py-4 container">
                <div class="row">
                    <div class="col-md-8">
                        @yield('content')
                    </div>

                    <div class="col-md-4">
                        @include('partials.app._side')
                    </div>
                </div>
            </main>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
