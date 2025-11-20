<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Squad;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('squad')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $squads = Squad::all();
        return view('students.create', compact('squads'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|integer|unique:students',
            'name' => 'required|string|max:255',
            'major' => 'required|in:PPLG,TJKT,DKV,BCF',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:pending,verified',
            'squad_id' => 'required|exists:squads,id',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        Student::create($validated);

        return redirect()->route('students.index')->with('Berhasil!', 'Murid baru telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $squads = Squad::all();
        return view('students.edit', compact('student', 'squads'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nisn' => 'required|integer|unique:students,nisn,' . $student->id,
            'name' => 'required|string|max:255',
            'major' => 'required|in:PPLG,TJKT,DKV,BCF',
            'password' => 'nullable|string|min:8|confirmed',
            'status' => 'required|in:pending,verified',
            'squad_id' => 'required|exists:squads,id',
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = bcrypt($validated['password']);
        }

        $student->update($validated);

        return redirect()->route('students.index')->with('Berhasil!', 'Data murid telah diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('Berhasil!', 'Murid telah dihapus.');
    }
}
