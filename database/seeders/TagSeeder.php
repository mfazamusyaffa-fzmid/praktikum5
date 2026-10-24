<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        // Data tag awal
        foreach (['desa', 'warga', 'kegiatan', 'ekonomi', 'lingkungan'] as $nama) {
            Tag::firstOrCreate(['nama' => $nama]);
        }
    }
}