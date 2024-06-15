<?php

namespace App\Models\Guest\Relationships;
use App\Models\Room\Room;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait GuestRelationship
{
    public function room(): HasOne
    {
        return $this->hasOne(Room::class);
    }
}
