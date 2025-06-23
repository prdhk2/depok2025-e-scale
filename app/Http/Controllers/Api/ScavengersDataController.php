<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\ScavengersWeightData;

class ScavengersDataController {

    public function getUser($id) {
        $user = User::where('id', $id)->where('role_id', '<>', '1')->first();
        if (!$user) {
            return response()->json(['error' => 'Access denied'], 403);
        }

        return response()->json([
            'name'      => $user->name,
            'username'  => $user->username,
            'email'     => $user->email,
            'profile'   => $user->profile,
            'role'      => $user->role ? $user->role->name : null,
        ]);
    }

    public function saveMlo(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            return response()->json(['error' => 'User tidak valid atau akses ditolak'], 403);
        }

        ScavengersWeightData::create([
            'user_id'   => $user->id,
            'role'   => $user->role,
            'no_order'  => '#PTAL-' . date('sHidmyY'),
            'mlo'       => $request->weight,
            'plastic'   => 0,
        ]);

        return response()->json(['success' => true]);
    }


    public function savePlastic(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            return response()->json(['error' => 'User tidak valid atau akses ditolak'], 403);
        }

        ScavengersWeightData::create([
            'user_id'   => $user->id,
            'role'   => $user->role,
            'no_order'  => '#PTAL-' . date('sHidmyY'),
            'mlo'       => 0,
            'plastic'   => $request->weight,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGabruk(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user = User::where('id', $request->user_id)->first();

        if(!$user) {
            return response()->json(['error' => 'User tidak valid'], 403);
        }

        ScavengersWeightData::create([
            'user_id'   => $user->id,
            'role'      => $user->role,
            'no_order'  => '#PTAL-' . date('sHidmyY'),
            'mlo'       => 0,
            'plastic'   => 0,
            'gabruk'    => $request->weight
        ]);

        return response()->json(['success' => true]);

    }


    public function getTotalWeight() {
        
        $today = now()->toDateString();
        
        $data = ScavengersWeightData::whereDate('created_at', $today)
            ->selectRaw('SUM(mlo) as mlo, SUM(plastic) as plastic')
            ->first();

        return response()->json([
            'mlo'       => (float) ($data->mlo ?? 0),
            'plastic'   => (float) ($data->plastic ?? 0),
        ]);
    }
}
