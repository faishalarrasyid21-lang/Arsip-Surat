<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoris = [
            [
                'nama_kategori' => 'Undangan',
                'keterangan' => 'Surat undangan acara'
            ],
            [
                'nama_kategori' => 'Pengumuman',
                'keterangan' => 'Surat pengumuman resmi'
            ],
            [
                'nama_kategori' => 'Nota Dinas',
                'keterangan' => 'Nota dinas internal'
            ],
            [
                'nama_kategori' => 'Pemberitahuan',
                'keterangan' => 'Surat pemberitahuan'
            ],
            [
                'nama_kategori' => 'Surat Keluar',
                'keterangan' => 'Surat keluar instansi'
            ],
            [
                'nama_kategori' => 'Surat Masuk',
                'keterangan' => 'Surat masuk instansi'
            ],
            [
                'nama_kategori' => 'Sertifikat Rumah',
                'keterangan' => 'Dokumen sertifikat rumah'
            ]
        ];

        foreach ($kategoris as $kategori) {
            Kategori::updateOrCreate(
                ['nama_kategori' => $kategori['nama_kategori']],
                $kategori
            );
        }
    }
}
