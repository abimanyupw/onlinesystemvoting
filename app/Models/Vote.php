<?php

namespace App\Models;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class vote extends Model
{
    protected $fillable = [
        'user_id',
        'candidate_id',
        'event_id',
        ];
        
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