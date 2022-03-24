@extends('layouts.master')

@section('content')

@if($results == []) 
        <h1 class="text-3xl font-bold bg-red-400 text-white text-center">PLAYER {{ $input }} DOES NOT EXIST</h1>
@endif

    
@foreach ($results as $result)

    <a href="player/{{ $result->player_id }}"><p class="text-white">{{ $result->first_name }} {{$result->last_name}}</p></a>

@endforeach

@endsection