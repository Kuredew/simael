<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Student::create([
            'name' => 'Lutfi',
            'nisn' => '123456789',
            'major' => 'PPLG',
            'password' => Hash::make('lutfi123'),
            'status' => 'pending',
            'squad_id' => 1,
        ]);

        Student::create([
            'name' => 'Ryandra',
            'nisn' => '12345678',
            'major' => 'TJKT',
            'password' => Hash::make('ryan123'),
            'status' => 'verified',
        ]);
    }
}
