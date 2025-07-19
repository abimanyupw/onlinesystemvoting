<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class event extends Model
{
    public function events():BelongsTo
    {
        return $this->belongsTo(user::class,'user_id');
    }
    public function votes():BelongsTo
    {
        return $this->belongsTo(vote::class,'event_id');
    }
}