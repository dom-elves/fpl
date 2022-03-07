@extends('layouts.master')

<h1 class="text-3xl font-bold underline"></h1>
  <div>

  </div>

  <div id="app">

   <example-component></example-component>

  </div>

  <div>
    <!-- {{ $data }} -->
    @foreach ($data as $player)

      <p class="m-0">{{ $player->first_name }} {{ $player->last_name}}</p>

    @endforeach
  </div>


