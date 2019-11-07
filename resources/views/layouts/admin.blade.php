<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
class="text-gray-900 antialiased leading-tight">

    <head>
        @include('partials.app._head')
    </head>

    <body class="min-h-screen bg-white font-sans">
        <div id="app">

            @include('partials.admin._navbar')

            <div class="container-fluid">
                <div class="row">

                    @include('partials.admin._sidebar')

                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                        <div class="pb-2 mb-3 border-bottom">
                            <h1 class="h2">@yield('page_title')</h1>
                        </div>

                        @yield('content')
                    </main>

                </div>
            </div>
        </div>

        @include('partials.app._scripts')
    </body>

</html>
