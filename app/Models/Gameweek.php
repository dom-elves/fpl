<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gameweek extends Model
{
    use HasFactory;

    public function mostSelectedPlayer()
    {
        
        $data =  $this->hasOne(Player::class, 'player_id', 'most_selected_player');
        // dd($data);
        return $data;
    }

    public function highestScoringPlayer()
    {
        $data =  $this->hasOne(Player::class, 'player_id', 'highest_scoring_player');
        
        return $data;
    }

    public function mostCaptainedPlayer()
    {
        $data =  $this->hasOne(Player::class, 'player_id', 'most_captained_player');
        
        return $data;
    }

    public function mostViceCaptainedPlayer()
    {
        $data =  $this->hasOne(Player::class, 'player_id', 'most_vice_captained_player');
        
        return $data;
    }

    public function mostTransferredInPlayer()
    {
        $data =  $this->hasOne(Player::class, 'player_id', 'most_transferred_in_player');
        
        return $data;
    }
}
