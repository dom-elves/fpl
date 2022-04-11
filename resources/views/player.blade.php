@extends('layouts.master')

@section('content')
     
    <player v-bind:player="{{ $player }}" :player_history="{{ $player_history }}"></player>

 <p class="text-white">{{ $player }}</p>
 <p class="text-white">{{ $player_history }}</p>

@endsection
<style>

    td {
        text-align: center;
        /* width: 200px; */ 
        padding: 3px;
    }

    table {
        margin: 10px;
        border: 2px solid black;
        /* width: 600px; */
    }

    th {
        padding: 10px;
    }
</style>
