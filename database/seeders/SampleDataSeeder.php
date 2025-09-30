<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Surat::truncate();
        
        $surats = [
            [
                'kategori' => 'sertifikat rumah',
                'nomor_surat' => 'SERT/001/2025',
                'tanggal_surat' => '2025-09-26',
                'perihal' => 'sertifikat tanah',
                'pengirim' => 'BPN',
                'keterangan' => 'Sertifikat kepemilikan tanah',
                'created_at' => '2025-09-26 13:46:00',
                'updated_at' => '2025-09-26 13:46:00'
            ],
            [
                'kategori' => 'Pengumuman',
                'nomor_surat' => 'PGM/002/2025',
                'tanggal_surat' => '2025-09-26',
                'perihal' => 'Proses Sertifikat',
                'pengirim' => 'Kelurahan',
                'keterangan' => 'Pengumuman proses sertifikat',
                'created_at' => '2025-09-26 13:33:00',
                'updated_at' => '2025-09-26 13:33:00'
            ]
        ];

        foreach ($surats as $surat) {
            Surat::create($surat);
        }
    }
}
