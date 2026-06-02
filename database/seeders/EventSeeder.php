<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'title' => 'Seminar AI',
            'description' => 'Pengenalan AI untuk mahasiswa',
            'event_date' => '2026-06-10',
            'location' => 'Aula FMIPA',
            'poster' => null,
            'status' => 'upcoming',
            'prodi_code' => '70'
        ]);

        Event::create([
            'title' => 'Workshop Laravel',
            'description' => 'Belajar Laravel Dasar',
            'event_date' => '2026-06-15',
            'location' => 'Lab Komputer',
            'poster' => null,
            'status' => 'upcoming',
            'prodi_code' => '70'
        ]);
    }
}