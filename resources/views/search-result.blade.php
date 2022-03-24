@extends('layouts.master')

@section('content')
    
@foreach ($results as $result)

    <a href="player/{{ $result->player_id }}"><p class="text-white">{{ $result->first_name }} {{$result->last_name}}</p></a>

@endforeach

@endsection