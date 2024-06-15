<?php

namespace App\Http\Controllers;

use App\Models\Room\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //    TODO Implementation of requests to validation inputs and Preparing the resource to customize returned data
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Room::with('guest')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'floor_number' => 'required|integer',
            'room_number' => 'required|integer',
            'capacity' => 'required|integer',
            'status' => 'required|in:READY,TAKEN,MAINTENANCE',
        ]);

        return Room::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room): Room
    {
        return $room;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room): Room
    {
        $request->validate([
            'floor_number' => 'required|integer',
            'room_number' => 'required|integer',
            'capacity' => 'required|integer',
            'status' => 'required|in:READY,TAKEN,MAINTENANCE',
        ]);

        $room->update($request->all());

        return $room;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room): \Illuminate\Http\Response
    {
        $room->delete();

        return response()->noContent();
    }

    public function assignGuest(Request $request, Room $room): \Illuminate\Http\JsonResponse
    {
        $request->validate(['guest_id' => 'required|exists:guests,id']);
        $room->update([
            'guest_id' => $request->guest_id,
            'status' => 'TAKEN',
        ]);

        return response()->json($room);
    }

    public function emptyRoom(Room $room): \Illuminate\Http\JsonResponse
    {
        $room->update([
            'status' => 'MAINTENANCE',
            'guest_id' => null,
        ]);

        return response()->json($room->load('guest'));
    }

    public function setReady(Room $room): \Illuminate\Http\JsonResponse
    {
        $room->status = 'READY';
        $room->save();

        return response()->json(['message' => 'Room status set to READY.']);
    }
}
