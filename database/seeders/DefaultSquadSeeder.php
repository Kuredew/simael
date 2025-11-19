<?php

namespace Database\Seeders;

use App\Models\Squad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSquadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Squad::create([
            'name' => 'Squad Dummy',
            'description' => 'Squad boongan buat tes doang',
        ]);
    }
}
