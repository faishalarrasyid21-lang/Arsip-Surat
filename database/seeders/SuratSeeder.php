<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $surats = [
            [
                'kategori' => 'Undangan',
                'nomor_surat' => 'UND/001/IX/2025',
                'tanggal_surat' => '2025-09-15',
                'perihal' => 'Undangan Rapat Koordinasi',
                'pengirim' => 'Ketua Program Studi',
                'keterangan' => 'Undangan rapat koordinasi semester ganjil',
                'nama_anda' => 'Admin Arsip',
                'nim_anda' => '20250001'
            ],
            [
                'kategori' => 'Pengumuman',
                'nomor_surat' => 'PGM/002/IX/2025',
                'tanggal_surat' => '2025-09-20',
                'perihal' => 'Pengumuman Jadwal Ujian Tengah Semester',
                'pengirim' => 'Bagian Akademik',
                'keterangan' => 'Pengumuman jadwal UTS semester ganjil 2025',
                'nama_anda' => 'Staff Akademik',
                'nim_anda' => '20250002'
            ],
            [
                'kategori' => 'Nota Dinas',
                'nomor_surat' => 'ND/003/IX/2025',
                'tanggal_surat' => '2025-09-25',
                'perihal' => 'Nota Dinas Pengadaan Alat Tulis',
                'pengirim' => 'Bagian Umum',
                'keterangan' => 'Pengadaan alat tulis kantor untuk semester ganjil',
                'nama_anda' => 'Staff Administrasi',
                'nim_anda' => '20250003'
            ],
            [
                'kategori' => 'Pemberitahuan',
                'nomor_surat' => 'PBT/004/IX/2025',
                'tanggal_surat' => '2025-09-28',
                'perihal' => 'Pemberitahuan Libur Nasional',
                'pengirim' => 'Rektorat',
                'keterangan' => 'Pemberitahuan libur nasional bulan Oktober',
                'nama_anda' => 'Sekretaris',
                'nim_anda' => '20250004'
            ],
            [
                'kategori' => 'Surat Masuk',
                'nomor_surat' => 'SM/005/IX/2025',
                'tanggal_surat' => '2025-09-30',
                'perihal' => 'Permohonan Kerjasama Praktik Kerja',
                'pengirim' => 'PT. Teknologi Indonesia',
                'keterangan' => 'Surat permohonan kerjasama untuk praktik kerja mahasiswa',
                'nama_anda' => 'Admin PKL',
                'nim_anda' => '20250005'
            ]
        ];

        foreach ($surats as $surat) {
            Surat::create($surat);
        }
    }
}
