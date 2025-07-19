<?php

namespace App\Models;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_time',
        'end_time',
        'is_active'
        ];
    
    public $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean'
    ];
    

    
    public function candidates():HasMany
    {
        return $this->HasMany(Candidate::class);
    }
    public function votes():BelongsTo
    {
        return $this->belongsTo(Vote::class);
    }
}