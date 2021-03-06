@extends('layouts.master')

@section('content')
<div class="flex justify-center">

    <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] justify-around flex flex-row">

        <div class="w-full flex flex-column">
        
            <div>

                <form action="/player-comparison" class="justify-around flex flex-row">
                {{ csrf_field() }}
                    <div class="mt-10 flex flex-row">

                        <input placeholder="Enter a player" name="search-input-1" class="search-field">
                        <button type="submit" class="bg-purple-50 text-[#38003c] text-bold search-button"><i class="fa-solid fa-magnifying-glass"></i></button>

                    </div>

                    <div class="mt-10 flex flex-row">

                        <input placeholder="Enter a player" name="search-input-2" class="search-field">
                        <button type="submit" class="bg-purple-50 text-[#38003c] text-bold search-button"><i class="fa-solid fa-magnifying-glass"></i></button>

                    </div>

                </form>

            </div>

            @if (!$player_list_1 == '' || !$player_list_2 == '')
                <div class="flex flex-row justify-around">

                    <div>

                        @foreach ($player_list_1 as $player)

                            <p class="text-white">{{ $player->first_name }} {{ $player->last_name }} ({{ $player->player_id }})</p>

                        @endforeach

                    </div>

                    <div>

                        @foreach ($player_list_2 as $player)

                            <p class="text-white">{{ $player->first_name }} {{ $player->last_name }} ({{ $player->player_id }})</p>

                        @endforeach

                    </div>

                </div>
            @endif

            @if (!$player_1 == '' || !$player_2 == '')
               
                <compare v-bind:player_1="{{ json_encode($player_1) }}" :player_2="{{ json_encode($player_2) }}"></compare>

            @endif

        </div>

    </div>

</div>
@endsection