<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class candidate extends Model
{
    protected $fillable = [
        'name',
        'event_id',
        'description',
        'image'
        ];
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}