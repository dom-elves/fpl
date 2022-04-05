@extends('layouts.master')

@section('content')


<table class="bg-purple-50 m-2">

    <tr>

        <th>Player Name</th>
        <th>Popularity<a href="sort-popularity-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-popularity-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Position</th>
        <th>Total Points<a href="sort-total-points-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-total-points-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>This Week<a href="sort-points-this-week-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-points-this-week-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Per Game<a href="sort-points-per-game-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-points-per-game-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Per Million<a href="sort-points-per-million-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-points-per-million-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Goals<a href="sort-goals-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-goals-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Assists<a href="sort-assists-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-assists-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Start Cost<a href="sort-start-cost-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-start-cost-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Now Cost<a href="sort-now-cost-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-now-cost-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>
        <th>Cost Change<a href="sort-cost-change-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a><a  href="sort-cost-change-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a></th>

    </tr>

    @foreach ($players as $player)

        <tr>
            <td>{{$player->first_name}} {{$player->last_name}}</td>
            <td>{{$player->percent_selected}}%</td>
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


<style>

    .upArrow {
        color: green;
    }

    .downArrow {
        color: red;
    }

</style>
