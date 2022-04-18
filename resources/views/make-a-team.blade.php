@extends('layouts.master')

@section('content')


<p class="text-white"> make a team blade file </p>

<make-a-team :goalkeepers="{{ json_encode($goalkeepers) }}" 
             :defenders="{{ json_encode($defenders) }}" 
             :midfielders="{{ json_encode($midfielders) }}" 
             :forwards="{{ json_encode($forwards) }}" 
             >
                </make-a-team>


@endsection