@extends('layouts.master')

@section('content')


    <!-- <example-component></example-component> -->
    
    <!-- can accept $player from main.blade as $data resides in the foreach loop -->

    <player v-bind:player="{{ json_encode($player) }}"></player>


<!-- <div class="w-4/5 flex flex-column align-center">
    <table> 
        <tr>
            <th class="text-center" colspan="3">Player</th>
        </tr>
        <tr>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Team</td>
        </tr>
        <tr>
            <td>{{ $player->first_name }}</td>
            <td>{{ $player->last_name }}</td>
            <td>{{ $player->team }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Points</th>
        </tr>
        <tr>
            <td>Total Points</td>
            <td>Points this week</td>
            <td>Points per game</td>
        </tr>
        <tr>
            <td>{{ $player->total_points_season }}</td>
            <td>{{ $player->total_points_week }}</td>
            <td>{{ $player->points_per_game }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Bonus Points</th>
        </tr>
        <tr>
            <td>Bonus Total Season</td>
            <td>Bonus This Week</td>
            <td>Times Bonus Added</td>
        </tr>
        <tr>
            <td>{{ $player->bonus_points_season }}</td>
            <td>TBD</td>
            <td>TDB</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Cost</th>
        </tr>
        <tr>
            <td>Start Cost</td>
            <td>Current Cost</td>
            <td>TBD</td>
        </tr>
        <tr>
            <td>{{ $player->start_cost }}</td>
            <td>{{ $player->current_cost }}</td>
            <td>TBD</td>
        </tr>
    </table>  

    <table> 
        <tr>
            <th class="text-center" colspan="3">Goals</th>
        </tr>
        <tr>
            <td>Goals Scored</td>
            <td>Goals Assisted</td>
            <td>Own Goals</td>
        </tr>
        <tr>
            <td>{{ $player->goals_scored }}</td>
            <td>{{ $player->goals_assisted }}</td>
            <td>{{ $player->own_goals }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Defence</th>
        </tr>
        <tr>
            <td>Goals Conceded</td>
            <td>Clean Sheets</td>
            <td>TBD</td>
        </tr>
        <tr>
            <td>{{ $player->goals_conceded }}</td>
            <td>{{ $player->clean_sheets }}</td>
            <td>TBD</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Keeper Stats</th>
        </tr>
        <tr>
            <td>Saves</td>
            <td>Penalties Saved</td>
            <td>Clean Sheets</td>
        <tr>
            <td>{{ $player->saves }}</td>
            <td>{{ $player->penalties_saved }}</td>
            <td>{{ $player->clean_sheets }}</td>
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Misc.</th>
        </tr>
        <tr>
            <td>Yellow Cards</td>
            <td>Red Cards</td>
            <td>Penalties Saved</td>
        <tr>
            <td>{{ $player->yellow_cards }}</td>
            <td>{{ $player->red_cards }}</td>
            <td>{{ $player->penalties_missed }}</td>            
        </tr>
    </table>

    <table>
        <tr>
            <th class="text-center" colspan="3">Popularity</th>
        </tr>
        <tr>
            <td>Transfers in</td>
            <td>Transfers out</td>
            <td>Difference</td>
        </tr>
        <tr>
            <td>{{ $player->transfers_in_week }}</td>
            <td>{{ $player->transfers_out_week }}</td>
            <td>TBD</td>
        </tr>
    </table>
</div> -->
    <!-- {{ $player->form }} -->
    <!-- {{ $player->minutes_season }} -->
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
