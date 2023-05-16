<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'price',
        'user_id',
        'event_id',
    ];
    public function user():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
