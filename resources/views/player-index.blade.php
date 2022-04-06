@extends('layouts.master')

@section('content')


<table class="bg-purple-50 m-2">

    <tr class="border-b-2 border-[#ccc]">

        <th class="border-r-2 border-[#ccc]">Player Name</th>

        <th class="p-1 border-r-2 border-[#ccc]">Popularity
            <div class="flex flex-row justify-center">
                <a href="sort-popularity-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-popularity-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="border-r-2 border-[#ccc]">Position</th>

        <th class="p-1 border-r-2 border-[#ccc]">Total Points
            <div class="flex flex-row justify-center">
                <a href="sort-total-points-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-total-points-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">This Week
            <div class="flex flex-row justify-center">
                <a href="sort-points-this-week-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-points-this-week-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>
    
        <th class="p-1 border-r-2 border-[#ccc]">Per Game
            <div class="flex flex-row justify-center">
                <a href="sort-points-per-game-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-points-per-game-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">Per Million
            <div class="flex flex-row justify-center">
                <a href="sort-points-per-million-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-points-per-million-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">Goals
            <div class="flex flex-row justify-center">
                <a href="sort-goals-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-goals-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>
        
        <th class="p-1 border-r-2 border-[#ccc]">Assists
            <div class="flex flex-row justify-center">
                <a href="sort-assists-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-assists-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">Start Cost
            <div class="flex flex-row justify-center">
                <a href="sort-start-cost-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-start-cost-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">Now Cost
            <div class="flex flex-row justify-center">
                <a href="sort-now-cost-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-now-cost-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th>

        <th class="p-1 border-r-2 border-[#ccc]">Cost Change
            <div class="flex flex-row justify-center">
                <a href="sort-cost-change-desc"><i class="fa-solid fa-angle-up w-[20px] h-[20px] upArrow"></i></a>
                <a  href="sort-cost-change-asc"><i class="fa-solid fa-angle-down w-[20px] h-[20px] downArrow"></i></a>
            </div>
        </th> 

    </tr>

    @foreach ($players as $player)

        <tr class="border-b-2 border-[#ccc]">
            <td class="p-1 border-r-2 border-[#ccc]"><a href="player/{{ $player->player_id }}">{{$player->first_name}} {{$player->last_name}}</a></td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->percent_selected}}%</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->position}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->total_points_season}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->total_points_week}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->points_per_game}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->value}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->goals_scored}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->goals_assisted}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->start_cost}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->current_cost}}</td>
            <td class="p-1 border-r-2 border-[#ccc]">{{$player->cost_change}}</td>
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
