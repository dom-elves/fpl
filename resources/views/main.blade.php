@extends('layouts.master')

@section('content')

  <example-component></example-component>

  <!-- <game-weeks></game-weeks> -->

  <div class="flex flex-row m-20">
    <div>
        <a href="update-players" class="text-3xl font-bold text-white bg-green-400 p-10">Update Players</a>
    </div>

    <div>
        <a href="update-table" class="text-3xl font-bold text-white bg-red-400 p-10">Ignore</a>
    </div>
  </div>
  
  <div>
    <table>

      <tr>
        <!-- add search feature for players after player component is built -->
        <th>Player</th>
        <th>Points</th>
        <th>Player ID</th>
      </tr>

        
        @foreach ($data as $player)
          <tr>
            <td><a href="/player/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></td>

            <td>{{ $player->total_points_season }}</td>
            <td>{{ $player->id }}</td>
            <td>{{ $player->player_id }}
          </tr>
          

        @endforeach  

    </table>
  </div>

@endsection
