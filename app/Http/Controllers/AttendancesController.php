<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendancesController extends Controller
{
    public function datang() {
        $user_id = Auth::user()->id;
        $kehadiranHariIni = Attendance::where('user_id', $user_id)->whereDate('tanggal', Carbon::today())->first();
        $tanggal = Carbon::today();
        $waktu_datang = Carbon::now('Asia/Jakarta');

        if(!$kehadiranHariIni) {
            Attendance::create([
                'user_id' => $user_id,
                'tanggal' => $tanggal,
                'keterangan' => 'hadir',
                'waktu_datang' => $waktu_datang,
            ]);
            return redirect()->back()->with('success', 'Berhasil Absen datang');
        } else {
            return redirect()->back()->with('message', 'Anda sudah absen hari ini');
        }
    }

    public function pulang() {
        $user_id = Auth::user()->id;
        $waktu_pulang = Carbon::now('Asia/Jakarta');
        
        // Cek apakah sudah ada data kehadiran untuk hari ini
        $kehadiranHariIni = Attendance::where('user_id', $user_id)->whereDate('tanggal', Carbon::today())->first();
    
        if ($kehadiranHariIni && is_null($kehadiranHariIni->waktu_pulang)) {
            // Update waktu pulang jika belum ada
            $kehadiranHariIni->update([
                'waktu_pulang' => $waktu_pulang
            ]);
            return redirect()->back()->with('success', 'Berhasil absen pulang');    
        } elseif ($kehadiranHariIni && !is_null($kehadiranHariIni->waktu_pulang)) {
            // Sudah absen pulang sebelumnya
            return redirect()->back()->with('message', 'Anda sudah absen pulang hari ini');
        } else {
            // Jika belum absen datang, tidak bisa absen pulang
            return redirect()->back()->with('message', 'Anda belum absen datang hari ini');
        }
    }
    
}
