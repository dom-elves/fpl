@extends('layouts.master')

@section('content')
  
  <div class="bg-[#38003c] flex justify-center items-center flex-column">

  <div class="flex flex-row w-[900px] justify-around">

      <a href="update-teams" class="mt-2"><div class="w-[250px] bg-[#00ff85] font-bold text-[30px] text-white h-[50px] text-center">Update Teams</div></a>

      <a href="update-players" class="mt-2"><div class="w-[250px] bg-[#00ff85] font-bold text-[30px] text-white h-[50px] text-center">Update Players</div></a>

      <a href="player-history" class="mt-2"><div class="w-[250px] bg-[#00ff85] font-bold text-[15px] text-white h-[50px] text-center">Update Player History</div></a>

  </div>
  
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
