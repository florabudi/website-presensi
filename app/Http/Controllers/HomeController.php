<?php

namespace App\Http\Controllers;


use App\Models\Attendance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil semua data kehadiran
        $attendances = Attendance::all();
        
        // Mengembalikan tampilan dengan data kehadiran
        return view('home', compact('attendances'));
    }

    public function store(Request $request)
    {
        // Menyimpan data kehadiran baru
        $attendance = Attendance::create($request->all());
        
        // Mengembalikan tampilan atau pesan sederhana
        return redirect()->route('attendance.index')->with('success', 'Attendance created successfully.');
    }
}