<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarWeightData;
use App\Models\CardMember;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CarDataController {

    public function AddWeightData(Request $request) {
        $request->validate([
            'driver_id'     => 'required|integer',
            'customer_id'   => 'required|integer',
            'weight_in'     => 'required|numeric',
            'time_in'       => 'required|date',
            'weight_out'    => 'required|numeric',
            'time_out'      => 'required|date'
        ]);

        $driver = CardMember::find($request->driver_id);
        if (!$driver) {
            return response()->json(['error' => 'Driver tidak ditemukan'], 403);
        }

        $customer = Customer::find($request->customer_id);
        if (!$customer) {
            return response()->json(['error' => 'Customer tidak ditemukan'], 403);
        }

        CarWeightData::create([
            'driver_id'     => $request->driver_id,
            'no_order'      => '#PTAL-CAR' . date('sHidmyY'),
            'customer_id'   => $request->customer_id,
            'weight_in'     => $request->weight_in,
            'time_in'       => $request->time_in,
            'weight_out'    => $request->weight_out,
            'time_out'      => $request->time_out
        ]);

        return response()->json(['success' => true]);
    }
    
    public function CarWeightDataIn(Request $request)
    {
        $request->validate([
            'driver_id'     => 'required|integer',
            'customer_id'   => 'required|integer',
            'weight_in'     => 'required|numeric',
            'time_in'       => 'required|date'
        ]);

        $driver = CardMember::find($request->driver_id);
        if (!$driver) {
            return response()->json(['error' => 'Driver tidak ditemukan'], 403);
        }

        $customer = Customer::find($request->customer_id);
        if (!$customer) {
            return response()->json(['error' => 'Customer tidak ditemukan'], 403);
        }

        CarWeightData::create([
            'driver_id'     => $request->driver_id,
            'no_order'      => '#PTAL-CAR' . date('sHidmyY'),
            'customer_id'   => $request->customer_id,
            'weight_in'     => $request->weight_in,
            'time_in'       => $request->time_in
        ]);

        return response()->json(['success' => true]);
    }

    public function CarWeightDataOut(Request $request)
    {
        $request->validate([
            'driver_id'    => 'required|integer',
            'customer_id'  => 'required|integer',
            'weight_out'   => 'required|numeric',
            'time_out'     => 'required|date',
            
        ]);
    
        $today = Carbon::today();

        $carData = CarWeightData::whereNull('weight_out')
            ->where('driver_id', $request->driver_id)
            ->where('customer_id', $request->customer_id)
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$carData) {
            return response()->json(['error' => 'Data masuk hari ini tidak ditemukan atau sudah ditimbang keluar'], 404);
        }
    
        $carData->update([
            'weight_out' => $request->weight_out,
            'time_out' => $request->time_out
        ]);
    
        return response()->json(['success' => true]);
    }
    

    public function getCustomer() {
        $customers = Customer::all();

        if (!$customers) {
            return response()->json(['error' => 'Customer not found!'], 403);
        }

        return response()->json($customers);
    }
}