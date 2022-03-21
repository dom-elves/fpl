@extends('layouts.master')

<p>gameweeks blade, outside of section (maybe review this at some point)</p>

<div>
    <a href="update-gameweeks" class="text-3xl font-bold text-white bg-green-400 p-10">Update Gameweek</a>
</div>

@section('content')

    <p>gameweeks blade inside of section</p>

    <div class="flex flex-wrap bg-[#38003c]">

        @foreach ($data as $gameweek)
            
            <game-week v-bind:gameweek="{{ json_encode($gameweek) }}"></game-week>

        @endforeach

    </div>
@endsection


