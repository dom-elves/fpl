@extends('layouts.master')

<p>gameweeks blade, outside of section (maybe review this at some point)</p>

@section('content')

    <p>gameweeks blade inside of section</p>
    <div class="flex flex-wrap">
    @foreach ($data as $gameweek)
        <div class="w-[200px] m-10">
            <p>Gameweek {{ $gameweek->id}}</p>

            <p>Highest Scoring squad</p>
            <p>{{ $gameweek->highest_team_points}}</p>
        
            <p>Average Squad Score</p>
            <p>{{ $gameweek->average_team_points }}</p>

            <p>Most Selected Player</p>
            <p>{{ $gameweek->most_selected_player }}</p>

            <p>Highest Scoring Player (score)</p>
            <p>{{ $gameweek->highest_scoring_player }} ( 0 )</p>

            <p>Most Captained Player</p>
            <p>{{ $gameweek->most_captained_player }}</p>

            <p>Most Vice-Captained Player</p>
            <p>{{ $gameweek->most_vice_captained_player }}</p>

            <p>Most Transferred-In Player</p>
            <p>{{ $gameweek->most_transferred_in_player }}</p>
        </div>
    @endforeach
</div>
@endsection


