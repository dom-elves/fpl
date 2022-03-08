@extends('layouts.master')

<player></player>

    {{ $player->first_name }}
    {{ $player->last_name }}
    {{ $player->team }}
    {{ $player->total_points_season }}
    {{ $player->total_points_week }}
    {{ $player->points_per_game }}
    {{ $player->start_cost }}
    {{ $player->current_cost }}
    {{ $player->goals_scored }}
    {{ $player->goals_assisted }}
    {{ $player->goals_conceded }}
    {{ $player->clean_sheets }}
    {{ $player->own_goals }}
    {{ $player->penalties_saved }}
    {{ $player->penalties_missed }}
    {{ $player->yellow_cards }}
    {{ $player->red_cards }}
    {{ $player->saves }}
    {{ $player->bonus_points_week }}
    {{ $player->bonus_points_season }}
    {{ $player->form }}
    {{ $player->minutes_season }}
    {{ $player->transfers_in_week }}
    {{ $player->transfers_out_week }}
