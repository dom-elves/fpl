@extends('layouts.master')

@section('content')


<p class="text-white"> make a team blade file </p>

<make-a-team :players="{{ json_encode($players) }}" :teams="{{ json_encode($teams) }}"></make-a-team>


@endsection