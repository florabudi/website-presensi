<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Kehadiran; // Tambahkan model Kehadiran
use Illuminate\Http\Request;

class TabelRekap extends Controller
{
    // Method untuk menampilkan daftar kehadiran
    public function index()
    {
        // Ambil semua data kehadiran dari tabel
        $kehadiran = Attendance::all(); 
        return view('about', compact('kehadiran')); // Tampilkan data di view 'about'
    }

    // Method untuk menambahkan data kehadiran baru
    public function tambahDatang()
    {
        // Tambahkan data kehadiran baru ke dalam database
        Attendance::create([
            'nama' => 'John Doe', // Nama dapat diubah sesuai kebutuhan
            'kelas' => '12',
            'jurusan' => 'RPL/PPLG',
            'tanggal' => now()->format('Y-m-d'),  // Ambil tanggal saat ini
            'keterangan' => 'hadir',
            'wktdatang' => now()->format('H:i:s'), // Waktu kedatangan saat ini
            'wktpulang' => null // Kosong karena belum pulang
        ]);

        // Setelah berhasil, arahkan ke halaman rekap presensi
        return redirect()->route('about'); // Arahkan ke rute halaman about atau rekap
    }

    // Method untuk mengajukan izin
    public function ajukanIzin(Request $request)
    {
        $validatedData = $request->validate([
            'izinTanggal' => 'required|date',
            'izinKeterangan' => 'required|string|max:255',
        ]);

        // Simpan data izin ke dalam database
        Attendance::create([
            'nama' => auth()->user()->name, // Ambil nama dari user yang sedang login
            'kelas' => '12', // Sesuaikan dengan data yang relevan
            'jurusan' => 'RPL/PPLG', // Sesuaikan dengan data yang relevan
            'tanggal' => $validatedData['izinTanggal'],
            'keterangan' => 'izin',
            'wktdatang' => null, // Kosongkan karena ini izin
            'wktpulang' => null, // Kosongkan karena ini izin
        ]);

        // Redirect atau kembali ke halaman yang diinginkan
        return redirect()->route('home')->with('success', 'Izin berhasil diajukan!');
    }

    // Method lain-lain
}
