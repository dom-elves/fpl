@extends('layouts.master')

@section('content')


   <p class="text-white">player blade</p>
    
    <player v-bind:player="{{ $player }}"></player>

    


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
