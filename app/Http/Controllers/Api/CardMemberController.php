<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CardMember;
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
}
