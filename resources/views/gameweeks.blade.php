@extends('layouts.master')

<!-- <p>gameweeks blade, outside of section (maybe review this at some point)</p> -->

@section('content')

    <div class="bg-[#38003c] flex items-center flex flex-column">

    <a href="update-gameweeks" class="mt-2"><div class="w-[870px] bg-[#00ff85] font-bold text-[30px] text-white h-[50px] text-center">Update Gameweeks</div></a>

        <div class="flex flex-wrap w-[900px] justify-around">

            @foreach ($gameweeks as $gameweek)
                
                <game-week v-bind:gameweek="{{ json_encode($gameweek) }}" :teams="{{ json_encode($teams) }}"></game-week>

            @endforeach

        </div>
    </div>
@endsection


