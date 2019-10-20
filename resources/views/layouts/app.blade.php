<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            @include('partials.app._navbar')

            <div class="blog-header">
                <div class="container w-4/5">
                    <h1 class="blog-title">The Bootstrap Blog</h1>
                    <p class="lead blog-description">An example blog template built with Bootstrap.</p>
                </div>
            </div>

            <main class="py-4 container w-4/5">
                <div class="row">
                    <div class="col-md-8 blog-main">
                        @yield('content')
                    </div>

                    <div class="col-sm-3 offset-sm-1 blog-sidebar">
                        @yield('sidebar')
                    </div>
                </div>
            </main>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
