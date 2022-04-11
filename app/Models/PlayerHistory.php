<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerHistory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'player_score_history';

    /**
     * The primary key associated with the table, has to be player_id rather than id
     *
     * @var string
     */
    protected $primaryKey = 'player_id';

    
}
