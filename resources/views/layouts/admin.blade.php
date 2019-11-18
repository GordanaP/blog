<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">
            <nav>
                @include('partials.admin._navbar')
            </nav>

            <div class="container-fluid">
                <div class="row">

                    <aside>
                        @include('partials.admin._sidebar')
                    </aside>

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                        @yield('page_title')

                        @yield('content')

                    </main>

                </div>
            </div>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
