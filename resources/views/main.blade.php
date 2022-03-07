@extends('layouts.master')

<h1 class="text-3xl font-bold underline"></h1>
  <div>

  </div>

  <div id="app">

   <example-component></example-component>

   <player></player>
   
  </div>

  <div>
    <table>

      <tr>
        <!-- add search feature for players after player component is built -->
        <th>Player</th>
        <th>Points</th>
        <th>add more</th>
      </tr>

        @foreach ($data as $player)
          <tr>
            <td>{{ $player->first_name }} {{ $player->last_name }}</td>

            <td>{{ $player->total_points_season }}</td>

            <td> add more </td>
          </tr>
        @endforeach  
    </table>
  </div>


