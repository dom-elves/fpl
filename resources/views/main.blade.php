@extends('layouts.master')

@section('content')
  
  <div class="bg-[#38003c] flex justify-center">
  
    <div class="flex flex-wrap w-[900px]">

      @foreach ($teams as $team)
      
      <div class="border-2 border-[#00ff85] p-1 m-2 bg-purple-50 w-[270px]">
      <p class="text-center font-bold">{{ $team->team_name }}</p>

        @foreach ($players as $player)
        
          <a href="player/{{ $player->player_id }}"><p class="text-center">{{ App\Http\Controllers\TeamsController::checkTeam($player, $team) }}</p></a>
          
        @endforeach

    
      
      </div>
      @endforeach

      

    </div>

  </div>



@endsection
