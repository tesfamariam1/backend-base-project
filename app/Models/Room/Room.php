<?php

namespace App\Models\Room;

use App\Models\Guest\Guest;
use App\Models\Room\Relationships\RoomRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes, RoomRelationship;

    protected $fillable = ['floor_number', 'room_number', 'capacity', 'status', 'guest_id'];
}
