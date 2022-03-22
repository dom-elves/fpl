<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'player_id';

    public function getPlayerTeam()
    {
        $data =  $this->hasOne(Team::class, 'team_id', 'team');
        // dd($data);
        return $data;
    }
}
