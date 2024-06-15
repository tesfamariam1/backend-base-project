<?php

namespace App\Models\Room\Relationships;
use App\Models\Guest\Guest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait RoomRelationship
{
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }
}
