<html>

    <head>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- <link href="{{ asset('sass/app.scss') }}" rel="stylesheet"> -->

        <style>
            .button-hover-state:hover {
                    background-color: #38003c;
                    color: #04f5ff;
                    border: 2px solid #04f5ff;
            }

            .search-field {
                background-color: #38003c;
                color: #FFF;
                border-top: 2px solid #04f5ff;
                border-left: 2px solid #04f5ff;
                border-bottom: 2px solid #04f5ff;
                padding: 5px;
                border-top-left-radius: 5px;
                border-bottom-left-radius: 5px;
                height: 40px;
                outline: none;
            }

            .search-button {
                border-top-right-radius: 5px;
                border-bottom-right-radius: 5px;
                border-top: 2px solid #04f5ff;
                border-right: 2px solid #04f5ff;
                border-bottom: 2px solid #04f5ff;
                background-color: #38003c;
                color: #FFF;
                margin: none;
                height: 40px;
                padding: 5px;
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

                <input type="text" placeholder="Search for a player" class="w-[250px] search-field" name="search-field"></input>
                <button type="submit" class="text-bold search-button"><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>
        </form>

        <select id="navigation" onchange="goSomewhere()">

            <option>Select where to go</option>
            <option value="/main">Main</option>
            <option value="/gameweeks">Gameweeks</option>
            <option value="/player-index">Player Index</option>
            <option value="/player-comparison">Player Comparison</option>
            <option value="/top-trumps">Top Trumps</option>
            <option value="/make-a-team">Make a team</option>

        </select>

    </header>
        <div id="app">

            @yield('content') <!-- refers to all -->

        </div>
    </body>

    <script>

        function goSomewhere() {
            const base = 'http://127.0.0.1:8000'
            let nav = document.getElementById("navigation").value;
            console.log(nav);
            window.location.href = base + nav;

        };
        
        
    </script>

    <script src="{{ mix('/js/app.js') }}"></script>
    
</html>

<!-- <script> has to live outsdie <head> due to DOM order -->