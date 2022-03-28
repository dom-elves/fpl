@extends('layouts.master')

@section('content')
<div class="flex justify-center">

    <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] justify-around flex flex-row">

        <div class="w-full flex flex-column">
        {{ $search_results_json }}
            <div>

                <form action="/player-comparison" class="justify-around flex flex-row">
                {{ csrf_field() }}
                    <div>

                        <input placeholder="Enter a player" name="search-input-1">
                        <button type="submit" class="bg-purple-50 p-1 text-[#38003c] text-bold">Find</button>
                    </div>

                    <div>

                        <input placeholder="Enter a player" name="search-input-2">
                        <button type="submit" class="bg-purple-50 p-1 text-[#38003c] text-bold">Find</button>
                    </div>

                </form>

            </div>

            <compare v-bind:search_results="{{ $search_results_json }}"></compare>
            
        </div>

    </div>

</div>
@endsection