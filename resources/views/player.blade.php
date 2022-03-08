@extends('layouts.master')

<player></player>

<table> <!--sort out stuff that's applicable to positions, after player position is done, may need total restructure -->
    <th>Player</th>
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

    <th>Points</th>
    <tr>
        <td>Total Points</td>
        <td>Points this week</td>
        <td>Points per game</td>
    </tr>
    <tr>
        <td>{{ $player->total_points_season }}</td>
        <td>{{ $player->total_points_week }}</td>
        <td>{{ $player->points_per_game }}<td>
    </tr>

    <th>Bonus Points</th>
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

    <th>Cost</th>
    <tr>
        <td>Start Cost</td>
        <td>Current Cost</td>
        <td>TBD</td><!-- find something to put here-->
    </tr>
    <tr>
        <td>{{ $player->start_cost }}</td>
        <td>{{ $player->current_cost }}</td>
        <td>TBD</td><!-- find something to put here-->
    </tr>

    <th>Goals</th>
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

    <th>Defence</th>
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

    <th>Keeper Stats</th>
    <tr>
        <td>Saves</td>
        <td>Penalties Saved</td>
        <td>Clean Sheets</td>
    <tr>
        <td>{{ $player->saves }}</td>
        <td>{{ $player->penalties_saved }}</td>
        <td>{{ $player->clean_sheets }}</td>
    </tr>

    <th>Misc.</th>
    <tr>
        <td>Yellow Cards</td>
        <td>Red Cards</td>
        <td>Penalties Saved</td>
    <tr>
        <td>{{ $player->yellow_cards }}</td>
        <td>{{ $player->red_cards }}</td>
        <td>{{ $player->penalties_missed }}</td>            
    </tr>

    <th>Popularity</th>
    <tr>
        <td>Transfers in</td>
        <td>Transfers out</td>
        <td>Difference</td>
    </tr>
    <tr>
        <td>{{ $player->transfers_in_week }}</td>
        <td>{{ $player->transfers_out_week }}</td>
        <td>TBD</td><!-- figure out how to calc dif, maybe with js? -->
    </tr>
</table>

    <!-- {{ $player->form }} -->
    <!-- {{ $player->minutes_season }} -->