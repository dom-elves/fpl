@extends('layouts.master')

@section('content')

  <div class="flex flex-row m-20">
    <div>
        <a href="update-players" class="text-2xl font-bold text-white bg-green-400 p-5 m-2">Update Players</a>
    </div>

    <div>
        <a href="update-teams" class="text-2xl font-bold text-white bg-green-400 p-5 m-2">Update Teams</a>
    </div>

    <div>
        <a href="gameweeks" class="text-2xl font-bold text-white bg-blue-400 p-5 m-2">Gameweeks</a>
    </div>

  </div>

  <!-- <div>
    @foreach ($players as $player)
    <p class="text-white">{{ $player->team }}</p>
    @endforeach
  </div> -->
  
  <div class="bg-[#38003c] flex justify-center">
  
    <div class="flex flex-wrap w-[900px]">

      @foreach ($teams as $team)
      <!-- <p>{{ App\Http\Controllers\TeamsController::assignPlayers($team->team_id) }}</p> -->
      <team v-bind:team="[{{ json_encode($team) }}, {{ App\Http\Controllers\TeamsController::assignPlayers($team->team_id) }}]"></team>

      @endforeach

    </div>

  </div>



@endsection
