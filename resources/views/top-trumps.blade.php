@extends('layouts.master')

@section('content')

<div>

    <top-trumps v-bind:players="{{ $players }}"></top-trumps>

</div>
@endsection