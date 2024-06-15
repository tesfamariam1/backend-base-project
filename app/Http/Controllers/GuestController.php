<?php

namespace App\Http\Controllers;

use App\Models\Guest\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //    TODO Implementation of requests to validation inputs and Preparing the resource to customize returned data
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Guest::with('room')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $guest = Guest::create($request->all());

        return response()->json($guest, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest): \Illuminate\Http\JsonResponse
    {
        return response()->json($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $guest->update($request->all());

        return response()->json($guest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest): \Illuminate\Http\JsonResponse
    {
        $guest->delete();

        return response()->json(null, 204);
    }
}
