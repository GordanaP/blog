<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            <nav>
                @include('partials.app._navbar')
            </nav>

            <div class="container w-4/5">
                <header class="blog-header">
                    <h1 class="blog-title">The Bootstrap Blog</h1>
                    <p class="lead blog-description">An example blog template built with Bootstrap.</p>
                </header>

                <div class="row py-4" >
                    <main class="col-md-8 blog-main">
                        @yield('content')
                    </main>
                    <aside class="col-sm-3 offset-sm-1 blog-sidebar">
                        @yield('sidebar')
                    </aside>
                </div>
            </div>

        </div>

        @include('partials.app._scripts')
    </body>

</html>
