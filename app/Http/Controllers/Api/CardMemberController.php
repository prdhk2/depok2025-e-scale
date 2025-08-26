<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardMember;
use App\Models\ScavengerMemberCards;
use Illuminate\Http\Request;

class CardMemberController {

    public function CardRegister(Request $request) {

        $request->validate([
            'card_number'       => 'required|numeric',
            'driver'            => 'required',
            'no_pol'            => 'required',
            'car_type'          => 'required'
        ]);

        CardMember::create([
            'card_number'   => $request->card_number,
            'driver'        => $request->driver,
            'no_pol'        => $request->no_pol,
            'car_type'      => $request->car_type
        ]);

        return response()->json(['success' => true]);
    }

    public function getMember() {
        
        $members = CardMember::all();

        if (!$members) {
            return response()->json(['error' => 'Member not found', 404]);
        }

        return response()->json($members);
    }

    public function getScavengerCardMembers(Request $request)
    {
        // For GET requests, validate query parameters like this:
        $request->validate([
            'uid' => 'required|string'
        ]);

        // Get the UID from query parameters
        $uid = $request->input('uid'); // or $request->query('uid')
        
        // Cari member berdasarkan UID
        $member = ScavengerMemberCards::where('uid', $uid)->first();

        if (!$member) {
            return response()->json([
                'valid' => false,
                'message' => 'Kartu tidak terdaftar'
            ], 404);
        }

        return response()->json([
            'valid' => true,
            'user_id' => $member->id,
            'name' => $member->name
        ]);
    }
}

