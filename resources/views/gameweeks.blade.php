@extends('layouts.master')

<p>gameweeks blade, outside of section (maybe review this at some point)</p>

@section('content')

    <p>gameweeks blade inside of section</p>

    <!-- $gameweeks is sort of accessible here -->
        <div class="flex flex-wrap">
        @foreach ($gameweeks as $gameweek)
        
            <game-week v-bind:gameweek="{{ json_encode($gameweek) }}"></game-week>
        
        @endforeach
        </div>
@endsection


