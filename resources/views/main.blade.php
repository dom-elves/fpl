@extends('layouts.master')

<h1 class="text-3xl font-bold underline">fpl</h1>


<div id="app">

  <example-component></example-component>

  <div class="flex flex-row">
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
        <th>add more</th>
      </tr>

        <!-- consider changing this to loop into <player> components, or create a separate view entirely -->
        @foreach ($data as $player)
          <tr>
            <td><a href="/player/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a></td>

            <td>{{ $player->total_points_season }}</td>
            <td>{{ $player->id }}</td>
            <td>{{ $player->minutes_season }}
          </tr>
          

        @endforeach  

    </table>
  </div>
</div>

