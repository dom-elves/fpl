<html>

    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .button-hover-state:hover {
              
                    background-color: #38003c;
                    color: #04f5ff;
                    border: 2px solid #04f5ff;
            }
        </style>
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
        
        <div id="header-buttons" class="flex flex-column">

            <div class="flex flex-row text-center">

                <a href="player-comparison" class="m-1"><div class="button-hover-state font-bold text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Player Comparison</div></a>

                <a href="update-players" class="m-1"><div class="button-hover-state font-bold text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Update Players</div></a>

                <a href="update-teams" class="m-1"><div class=" button-hover-state font-bold  text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Update Teams</div></a>

            </div>

            <div class="flex flex-row text-center">

                <a href="gameweeks" class="m-1"><div class="button-hover-state font-bold  text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Gameweeks</div></a>
                
                <a href="main" class="m-1"><div class="button-hover-state font-bold  text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Home</div></a>

                <a href="player-index" class="m-1"><div class=" button-hover-state font-bold  text-[#38003c] bg-[#04f5ff] border-[#38003c] border-2 w-[140px] p-1 rounded-sm">Player Index</div></a>

            </div>

        <div>
    </header>
        <div id="app">

            @yield('content') <!-- refers to all -->

        </div>
    </body>

    <script src="{{ mix('/js/app.js') }}"></script>
    
</html>

<!-- <script> has to live outsdie <head> due to DOM order -->