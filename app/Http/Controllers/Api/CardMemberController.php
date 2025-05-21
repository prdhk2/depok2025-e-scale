<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class CardMemberController {
    public function CardRegister(Request $request) {
        $request->validate([
            'card_number'       => 'required|numeric'
        ]);
    }
}
