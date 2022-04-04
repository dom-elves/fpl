@extends('layouts.master')

@section('content')

<table class="bg-purple-50 m-2">

    <tr>

        <th>Player Name</th>
        <th>Popularity</th>
        <th>Position</th>
        <th>Total Points</th>
        <th>Per Week</th>
        <th>Per Game</th>
        <th>Value</th>
        <th>Goals</th>
        <th>Assists</th>
        <th>Start Cost</th>
        <th>Now Cost</th>
        <th>Cost Change</th>

    </tr>

    @foreach ($players as $player)

        <tr>
            <td>{{$player->first_name}}{{$player->last_name}}</td>
            <td>{{$player->percent_selected}}</td>
            <td>{{$player->position}}</td>
            <td>{{$player->total_points_season}}</td>
            <td>{{$player->total_points_week}}</td>
            <td>{{$player->points_per_game}}</td>
            <td>{{$player->value}}</td>
            <td>{{$player->goals_scored}}</td>
            <td>{{$player->goals_assisted}}</td>
            <td>{{$player->start_cost}}</td>
            <td>{{$player->current_cost}}</td>
            <td>{{$player->cost_change}}</td>
        </tr>

    @endforeach

</table>

@endsection