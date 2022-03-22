@extends('layouts.master')

<p>gameweeks blade, outside of section (maybe review this at some point)</p>

<div>
    <a href="update-gameweeks" class="text-3xl font-bold text-white bg-green-400 p-10">Update Gameweek</a>
</div>

@section('content')

    <p>gameweeks blade inside of section</p>
    <div class="bg-[#38003c] flex justify-center">
    <div class="flex flex-wrap w-[900px]">

        @foreach ($gameweeks as $gameweek)
            
            <game-week v-bind:gameweek="{{ json_encode($gameweek) }}" :teams="{{ json_encode($teams) }}"></game-week>

        @endforeach

    </div>
    </div>
@endsection


