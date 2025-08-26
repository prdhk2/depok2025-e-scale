<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class AttendanceController 
{
    
    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required|string',
            'operator_name' => 'required|string',
            'timestamp' => 'required|date',
        ]);

        $uid = $request->uid;
        $operator = $request->operator_name;
        $timestamp = Carbon::parse($request->timestamp);
        $todayStart = $timestamp->copy()->startOfDay();
        $todayEnd = $timestamp->copy()->endOfDay();

        // Cek apakah sudah absen masuk hari ini dan belum pulang
        $existing = Attendance::where('uid', $uid)
            ->where('operator_name', $operator)
            ->whereBetween('time_in', [$todayStart, $todayEnd])
            ->whereNull('time_out')
            ->first();

        if ($existing) {
            return response()->json([
                'message' => 'Sudah absen masuk hari ini dan belum absen pulang.',
                'data' => $existing
            ], 200);
        }

        // Buat absen masuk baru
        $attendance = Attendance::create([
            'uid' => $uid,
            'operator_name' => $operator,
            'time_in' => $timestamp
        ]);

        return response()->json([
            'message' => 'Absen masuk berhasil',
            'data' => $attendance
        ], 201);
    }

    // Absen Pulang
    public function update(Request $request)
    {
        $request->validate([
            'uid' => 'required|string',
            'operator_name' => 'required|string',
            'timestamp' => 'required|date',
        ]);

        $uid = $request->uid;
        $operator = $request->operator_name;
        $timestamp = Carbon::parse($request->timestamp);
        $todayStart = $timestamp->copy()->startOfDay();
        $todayEnd = $timestamp->copy()->endOfDay();

        // Cari data yang belum di-absen pulang pada hari yang sama
        $attendance = Attendance::where('uid', $uid)
            ->where('operator_name', $operator)
            ->where('time_in', '>=', now()->subHours(24))
            ->whereNull('time_out')
            ->first();

        if (!$attendance) {
            return response()->json([
                'message' => 'Data absen masuk tidak ditemukan atau sudah absen pulang.'
            ], 404);
        }

        $attendance->time_out = $timestamp;
        $attendance->save();

        return response()->json([
            'message' => 'Absen pulang berhasil',
            'data' => $attendance
        ]);
    }
}
