<html>

    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body id="master-body">

    <h1 class="text-3xl font-bold underline">fpl thing</h1>
        <div id="app">

            @yield('content') <!-- refers to all -->

        </div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
</html>

<!-- <script> has to live outsdie <head> due to DOM order -->