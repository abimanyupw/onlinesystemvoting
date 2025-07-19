<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class vote extends Model
{
    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function events():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function candidates():BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}