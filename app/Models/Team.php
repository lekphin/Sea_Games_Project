<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'country',
        'member',
        'user_id',
    ];
    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }
    public static function store($reques, $id = null)
    {
        $team = $reques->only(['country', 'member','user_id']);

        $team = self::updateOrCreate(['id' => $id], $team);

        return $team;
    }
}
