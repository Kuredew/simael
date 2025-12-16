<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SquadController extends Controller
{
    public function __construct()
    {
        $this->middleware('student.auth', ['only' => 'store', 'update', 'kickMember', 'leave']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = Auth::guard('student')->user();

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:20|unique:squads,name',
            'description' => 'nullable|string',
        ]);

        $squad = Squad::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'leader_id' => $student->id,
        ]);

        $student->update(['squad_id' => $squad->id]);

        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Squad $squad)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|min:3|max:20|unique:squads,name,' . $squad->id,
            'company_name' => 'nullable|string|max:100',
            'company_address' => 'nullable|string|max:255',
            'status' => 'nullable|in:on-progress,diterima,pengajuan,unknown',
        ]);

        foreach ($validated as $key => $value) {
            if (!$validated[$key]) {
                unset($validated[$key]);
            }
        }

        $squad->update($validated);
        
        return redirect()->route('dashboard');
    }


    public function kickMember(Student $student)
    {
        if (!$student) {
            return redirect()->route('dashboard')->with('error', 'Student tidak ditemukan!');
        }

        $student->update([
            'squad_id' => null
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil mengeluarkan student dari squad');
    }

    public function leave(Squad $squad)
    {
        $student = Auth::guard('student')->user();

        // Hapus squad jika leader keluar dari squad
        if ($student->id == $squad->leader_id) {
            $squad->delete();
        } else {
            $student->update([
                'squad_id' => null
            ]);
        }

        return redirect()->route('dashboard');
    }
}
