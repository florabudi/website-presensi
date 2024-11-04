<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

// class AttendanceController extends Controller
// {
//     // Implementasi metode controller di sini
//     public function index()
//     {
//         $attendances = Attendance::all();
//         return view('attendance.index', compact('attendances'));
//     }

//     public function search(Request $request)
//     {
//         $search = $request->input('search');
//         $attendances = Attendance::where('nama', 'like', '%' . $search . '%')
//             ->orWhere('kelas', 'like', '%' . $search . '%')
//             ->orWhere('jurusan', 'like', '%' . $search . '%')
//             ->get();
//         return view('attendance.index', compact('attendances'));
//     }
// }
class MyController extends Controller
{
    //
}
