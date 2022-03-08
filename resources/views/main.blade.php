@extends('layouts.master')

<h1 class="text-3xl font-bold underline">fpl</h1>
  <div>

  </div>

  <div id="app">

    <example-component></example-component>

    <player></player>

  </div>

  <div>
      <a href="update" class="text-3xl font-bold text-white bg-green-400 p-10">Update</a>
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
          </tr>
        @endforeach  

    </table>
  </div>


