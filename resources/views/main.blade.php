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


  
  <div class="bg-[#38003c] flex justify-center">
  
    <div class="flex flex-wrap w-[900px]">

      @foreach ($teams as $team)
      
      <div class="border-2 border-[#00ff85] p-1 m-2">
      <p class="text-white">{{ $team->team_name }}</p>

        @foreach ($players as $player)
          <a href="player/{{ $player->player_id }}"><p class="text-white">{{ App\Http\Controllers\TeamsController::checkTeam($player, $team) }}</p></a>
        @endforeach

    
      
      </div>
      @endforeach

      

    </div>

  </div>



@endsection
