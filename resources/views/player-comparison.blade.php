@extends('layouts.master')

@section('content')
<div class="flex justify-center">

    <div class="w-[900px] h-[900px] border-l-2 border-r-2 border-[#00ff85] justify-around flex flex-row">

        <div class="w-full flex flex-column">

            <div>

                <form class="justify-around flex flex-row">

                    <div>

                        <input placeholder="Enter a player">

                    </div>

                    <div>

                        <input placeholder="Enter a player">

                    </div>

                </form>

            </div>
            
            <compare v-bind:player="{{ $players }}"></compare>
            
        </div>

    </div>

</div>
@endsection