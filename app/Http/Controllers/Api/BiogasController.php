<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\BiogasData;
use App\Models\TempMonitor;
use App\Http\Controllers\Controller;

class BiogasController
{
    public function pushData(Request $request) {
        $request->validate([
            'ph_1'                  => 'required|numeric',
            'ph_2'                  => 'required|numeric',
            'ph_3'                  => 'required|numeric',
            'ph_4'                  => 'required|numeric',
            'ph_5'                  => 'required|numeric',
            'ph_6'                  => 'required|numeric',
            'ph_7'                  => 'required|numeric',
            'gas_value_1'           => 'required|numeric',
            'pressureGas_1'         => 'required|numeric',
            'TemperatureGas_1'      => 'required|numeric',
            'gas_value_2'           => 'required|numeric',
            'pressureGas_2'         => 'required|numeric',
            'TemperatureGas_2'      => 'required|numeric',
            'Balloon_1'             => 'required|numeric',
            'Balloon_2'             => 'required|numeric',
            'Balloon_3'             => 'required|numeric',
            'Balloon_4'             => 'required|numeric',
        ]);

        BiogasData::create([
            'ph_1'                  => $request->ph_1,
            'ph_2'                  => $request->ph_2,
            'ph_3'                  => $request->ph_3,
            'ph_4'                  => $request->ph_4,
            'ph_5'                  => $request->ph_5,
            'ph_6'                  => $request->ph_6,
            'ph_7'                  => $request->ph_7,
            'gas_value_1'           => $request->gas_value_1,
            'pressureGas_1'         => $request->pressureGas_1,
            'temperatureGas_1'      => $request->TemperatureGas_1,
            'gas_value_2'           => $request->gas_value_2,
            'pressureGas_2'         => $request->pressureGas_2,
            'temperatureGas_2'      => $request->TemperatureGas_2,
            'Balloon_1'             => $request->Balloon_1,
            'Balloon_2'             => $request->Balloon_2,
            'Balloon_3'             => $request->Balloon_3,
            'Balloon_4'             => $request->Balloon_4
        ]);

        return response()->json(['success' => true]);
    }

    public function pushTemp(Request $request) {
        $request->validate([
            "Tmp_Icn"   => 'required',
            "Tmp_Dct"   => 'required',
            "Tmp_Prl"   => 'required'
        ]);

        TempMonitor::create([
            "Tmp_Icn"   => $request->Tmp_Icn,
            "Tmp_Dct"   => $request->Tmp_Dct,
            "Tmp_Prl"   => $request->Tmp_Prl    
        ]);

        return response()->json(['Success' => true]);
    }
}
