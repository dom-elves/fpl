@extends('layouts.master')

@section('content')

<div>

    <top-trumps-house :deck="{{ $deck }}"></top-trumps-house>

</div>

@endsection