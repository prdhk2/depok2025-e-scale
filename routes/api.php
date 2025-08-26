<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ScavengersDataController;
use App\Http\Controllers\Api\CarDataController;
use App\Http\Controllers\Api\CardMemberController;
use App\Http\Controllers\Api\BiogasController;
use App\Http\Controllers\Api\AttendanceController;

// Card Member


// Scavengers Apis
Route::get('/user/{id}', [ScavengersDataController::class, 'getUser']);
Route::post('/save-mlo', [ScavengersDataController::class, 'saveMlo']);
Route::post('/save-plastic', [ScavengersDataController::class, 'savePlastic']);
Route::get('/total-weight', [ScavengersDataController::class, 'getTotalWeight']);
Route::get('/get-member', [CardMemberController::class, 'getScavengerCardMembers']);

Route::post('/save-gabruk', [ScavengersDataController::class, 'saveGabruk']);
Route::post('/save-botol-plastik', [ScavengersDataController::class, 'saveBotolPlastik']);
Route::post('/save-kertas', [ScavengersDataController::class, 'saveKertas']);
Route::post('/save-kardus', [ScavengersDataController::class, 'saveKardus']);
Route::post('/save-botol-kaca', [ScavengersDataController::class, 'saveBotolKaca']);
Route::post('/save-aqua-gelas', [ScavengersDataController::class, 'saveAquaGelas']);
Route::post('/save-incenerator', [ScavengersDataController::class, 'incenerator']);
Route::post('/botol-biru', [ScavengersDataController::class, 'saveBotolBiru']);
Route::post('/gelas-polos', [ScavengersDataController::class, 'saveGelasPolos']);
Route::post('/gelas-warna', [ScavengersDataController::class, 'saveGelasWarna']);
Route::post('/gelas-polos-bunga', [ScavengersDataController::class, 'saveGelasBungaBesar']);
Route::post('/gelas-yakult-kecil', [ScavengersDataController::class, 'saveGelasYakultKecil']);
Route::post('/gelas-yakult-besar', [ScavengersDataController::class, 'saveGelasYakultBesar']);
Route::post('/botol-polos-putih', [ScavengersDataController::class, 'saveBotolPolosPutih']);
Route::post('/atom-warna-putih', [ScavengersDataController::class, 'saveAtomWarnaPutih']);
Route::post('/gelang-galon', [ScavengersDataController::class, 'saveGelangGalon']);
Route::post('/tutup', [ScavengersDataController::class, 'saveTutup']);
Route::post('/tutup-galon-besar', [ScavengersDataController::class, 'saveTutupGalonBesar']);
Route::post('/impek-regas', [ScavengersDataController::class, 'saveImpekRegas']);
Route::post('/emperan-warna-warni', [ScavengersDataController::class, 'saveEmperanWarnaWarni']);
Route::post('/mainan-warna', [ScavengersDataController::class, 'saveMainanWarna']);
Route::post('/botol-bening-lemes', [ScavengersDataController::class, 'saveBotolBeningLemes']);

// Car Weight Apis
Route::post('/addWeightData', [CarDataController::class, 'AddWeightData']);
Route::post('/weightDataIn', [CarDataController::class, 'CarWeightDataIn']);
Route::post('/weightDataOut', [CarDataController::class, 'CarWeightDataOut']);

// Card Member
Route::post('/register-card-member', [CardMemberController::class, 'CardRegister']);
Route::get('/getMember', [CardMemberController::class, 'getMember']);

// Customer Apis
Route::get('/getCustomer', [CarDataController::class, 'getCustomer']);

// Biogas Control system APis
Route::post('/biogas', [BiogasController::class, 'pushData']);
Route::post('/tempMonitor', [BiogasController::class, 'pushTemp']);

// Absensi operator
Route::post('/attendance', [AttendanceController::class, 'store']);     // Masuk
Route::put('/attendance', [AttendanceController::class, 'update']);