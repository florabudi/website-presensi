<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Menampilkan daftar kehadiran
    public function index()
    {
        $attendances = Attendance::all(); // Mengambil semua data kehadiran
        return view('admin.attendance', compact('attendances')); // Mengirim data ke view
    }

    // Mencari data kehadiran
    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Mengambil kata kunci pencarian
        $attendances = Attendance::where('nama', 'LIKE', "%{$searchTerm}%")
            ->orWhere('kelas', 'LIKE', "%{$searchTerm}%")
            ->orWhere('jurusan', 'LIKE', "%{$searchTerm}%")
            ->get(); // Mencari data berdasarkan kata kunci
        return view('admin.attendance', compact('attendances')); // Mengirim data hasil pencarian ke view
    }
}
