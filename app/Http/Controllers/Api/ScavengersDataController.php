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
            'role_id'      => $user->role ? $user->role->name : null,
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
            'user_id'   => $user_id,
            'role_id'   => $user->role,
            'no_order'  => '#PTAL-SCW' . date('sHidmyY'),
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

        $user_id = $request->user_id;

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => $request->weight,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function saveGabruk(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);
    
        // Get the user_id from request
        $user_id = $request->user_id;
    
        ScavengersWeightData::create([
            'user_id'       => $user_id, 
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => $request->weight,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);
    
        return response()->json(['success' => true]);
    }

    public function saveBotolPlastik(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => $request->weight,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function saveKertas(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => $request->weight,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function saveKardus(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => $request->weight,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function saveBotolKaca(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => $request->weight,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function saveAquaGelas(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => $request->weight,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);


    }

    public function incenerator(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        // dd([
        //     'user_id' => $user_id,
        //     'role_id_from_user' => $user->role_id,
        //     'user_data' => $user->toArray()
        // ]);

        ScavengersWeightData::create([
            'user_id'       => 1,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => $request->weight,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveBotolBiru(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;

        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => $request->weight,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGelasPolos(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => $request->weight,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGelasWarna(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => $request->weight,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGelasBungaBesar(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => $request->weight,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGelasYakultKecil(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => $request->weight,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    } 

        public function saveGelasYakultBesar(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => $request->weight,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveBotolPolosPutih(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => $request->weight,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveAtomWarnaPutih(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => $request->weight,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveGelangGalon(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' =>0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => $request->weight,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveTutup(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => $request->weight,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

        public function saveTutupGalonBesar(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => $request->weight,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveImpekRegas(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => $request->weight,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveEmperanWarnaWarni(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> $request->weight,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveMainanWarna(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => $request->weight,
            'botol_bening_lemes' => 0,
        ]);

        return response()->json(['success' => true]);
    }

    public function saveBotolBeningLemes(Request $request) {
        $request->validate([
            'user_id'   => 'required|integer',
            'weight'    => 'required|numeric'
        ]);

        $user_id = $request->user_id;
        
        ScavengersWeightData::create([
            'user_id'       => $user_id,
            'no_order'      => '#PTAL-SCW' . date('sHidmyY'),
            'mlo'           => 0,
            'plastic'       => 0,
            'gabruk'        => 0,
            'botol_plastik' => 0,
            'kertas'        => 0,
            'kardus'        => 0,
            'botol_kaca'    => 0,
            'aqua_gelas'    => 0,
            'incenerator'   => 0,
            'botol_biru'    => 0,
            'gelas_polos'   => 0,
            'gelas_warna'   => 0,
            'gelas_bunga_besar' => 0,
            'gelas_yakult_kecil' => 0,
            'gelas_yakult_besar' => 0,
            'botol_polos_putih'  => 0,
            'atom_warna_putih'   => 0,
            'gelang_galon'       => 0,
            'tutup'              => 0,
            'tutup_galon_besar'  => 0,
            'impek_regas'        => 0,
            'emperan_warna_warni'=> 0,
            'mainan_warna'       => 0,
            'botol_bening_lemes' => $request->weight,
        ]);

        return response()->json(['success' => true]);
    }

    public function getTotalWeight() {
        
        $today = now()->toDateString();
        
        $data = ScavengersWeightData::whereDate('created_at', $today)
            ->selectRaw('SUM(mlo) as mlo, 
                SUM(plastic) as plastic,
                SUM(gabruk) as gabruk,
                SUM(incenerator) as incenerator,
                SUM(botol_plastik) as botol_plastik,
                SUM(kertas) as kertas')
            ->first();

        return response()->json([
            'mlo'       => (float) ($data->mlo ?? 0),
            'plastic'   => (float) ($data->plastic ?? 0),
            'gabruk'    => (float) ($data->gabruk ?? 0),
            'incenerator' => (float) ($data->incenerator ?? 0),
            'botol_plastik' => (float) ($data->botol_plastik ?? 0),
            'kertas'        => (float) ($data->kertas ?? 0)
        ]);
    }
}
