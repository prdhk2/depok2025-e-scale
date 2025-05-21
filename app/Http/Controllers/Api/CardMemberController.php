<?php

namespace App\Http\Controllers\Api;

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
            'card_member'   => $request->card_number,
            'driver'        => $request->driver,
            'no_pol'        => $request->no_pol,
            'car_type'      => $request->car_type
        ]);

        return response()->json(['success' => true]);
    }
}
