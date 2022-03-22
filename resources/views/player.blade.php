@extends('layouts.master')

@section('content')


    <!-- <example-component></example-component> -->
    
    <!-- can accept $player from main.blade as $data resides in the foreach loop -->

    <player v-bind:player="{{ json_encode($player) }}"></player>


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
