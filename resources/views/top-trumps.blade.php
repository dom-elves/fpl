@extends('layouts.master')

@section('content')


<top-trumps v-bind:players="{{ $players }}"></top-trumps>

@endsection