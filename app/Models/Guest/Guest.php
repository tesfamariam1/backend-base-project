<?php

namespace App\Models\Guest;

use App\Models\Guest\Relationships\GuestRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use HasFactory, SoftDeletes, GuestRelationship;

    protected $fillable = ['full_name', 'age'];
}
