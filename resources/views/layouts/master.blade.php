<html>

    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body id="master-body" class="bg-[#38003c]">

    <header class="flex flex-row h-[100px] flex items-center border-b-2 border-[#00ff85] justify-around">

        <h1 class="text-3xl font-bold underline text-white">fpl visualiser</h1>

        <form action="/search-player">
        {{ csrf_field() }}
            <!-- <label class="text-3x1 text-white">Search:</label> -->
            <div class="flex flex-row">

                <input type="text" placeholder="Search for a player" class="w-[250px] p-1" name="search-field"></input>
                <button type="submit" class="bg-purple-50 p-1 text-[#38003c] text-bold">Find</button>

            </div>
        </form>

        <a href="/main"><div class="h-[50px] w-[50px] bg-[#00ff85] text-white">
            Home
        </div></a>

    </header>
        <div id="app">

            @yield('content') <!-- refers to all -->

        </div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>

</html>

<!-- <script> has to live outsdie <head> due to DOM order -->