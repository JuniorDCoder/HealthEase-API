<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hospital::insert([
            ['name' => 'Mbingo Annex', 'address' => 'Bamenda', 'phone_number' => '0772123456'],
            ['name' => 'Acha Annex', 'address' => 'Bamenda', 'phone_number' => '0782123456'],
            ['name' => 'Bambui Hospital', 'address' => 'Bambui', 'phone_number' => '0792123456'],
            ['name' => 'Bambili Integrated Health Center', 'address' => 'Bambili', 'phone_number' => '0702123456'],
        ]);
    }
}
