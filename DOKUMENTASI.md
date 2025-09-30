# Sistem Arsip Surat Digital

Aplikasi web untuk mengelola arsip surat secara digital yang dibuat menggunakan Laravel Framework. Aplikasi ini telah disesuaikan dengan design UI yang modern dengan sidebar navigation.

## 🌟 Fitur Utama

### 1. **Halaman Arsip (Dashboard)**
- **URL**: `/` atau `/surat`
- **Fitur**:
  - Pencarian surat berdasarkan judul
  - Tabel dengan kolom: Nomor Surat, Kategori, Judul, Waktu Pengarsipan, Aksi
  - Button Hapus (merah), Unduh (kuning), dan Lihat >> (biru)
  - Pagination untuk navigasi data

### 2. **Kategori Surat**
- **URL**: `/kategori`
- **Fitur**:
  - Manajemen kategori surat
  - Pencarian kategori
  - Button "Tambah Kategori Baru..."
  - Tabel dengan kolom: ID, Nama Kategori, Keterangan, Aksi
  - CRUD lengkap untuk kategori

### 3. **About**
- **URL**: `/about`
- **Fitur**:
  - Informasi pembuat aplikasi
  - Foto profile (bulat)
  - Data: Nama, NIM, Tanggal Pembuatan
  - Keterangan teknologi yang digunakan

### 4. **Arsipkan Surat**
- **URL**: `/surat/create`
- **Fitur**:
  - Form upload surat baru
  - Field: Nomor Surat, Kategori, Judul, File PDF
  - Upload file berformat PDF
  - Validasi form

## 🎨 Design Interface

### Sidebar Navigation
- **Brand**: "Arsip Surat" dengan icon
- **Menu Items**:
  - 📁 Arsip (halaman utama)
  - 🏷️ Kategori Surat
  - ℹ️ About
  - ➕ Arsipkan Surat (button hijau)

### Color Scheme
- **Primary**: Gradient biru-ungu (#667eea → #764ba2)
- **Success**: Gradient hijau (#2ecc71 → #27ae60)
- **Sidebar**: Gradient biru-ungu dengan efek hover
- **Background**: Light gray (#f8f9fa)

### Styling Features
- Modern card-based layout
- Hover effects pada buttons dan menu
- Responsive design
- Bootstrap 5 + custom CSS
- Font Awesome icons

## 📊 Data Structure

### Tabel Surat
```sql
- id (Primary Key)
- kategori (String)
- nomor_surat (String, Unique)
- tanggal_surat (Date)
- perihal (String) // Judul surat
- pengirim (String)
- keterangan (Text)
- file_path (String) // Path file PDF
- nama_anda (String)
- nim_anda (String)
- created_at (Timestamp)
- updated_at (Timestamp)
```

### Tabel Kategori
```sql
- id (Primary Key)
- nama_kategori (String, Unique)
- keterangan (Text)
- created_at (Timestamp)
- updated_at (Timestamp)
```

## 🗄️ Sample Data

### Kategori Default:
1. **sertifikat rumah** - sertifikat rumah
2. **pemberitahuan** - Tugas
3. **Undangan** - Surat undangan acara
4. **Pengumuman** - Surat pengumuman resmi
5. **Nota Dinas** - Nota dinas internal

### Sample Surat:
1. **ID 3**: sertifikat tanah (sertifikat rumah) - 2025-09-26 13:46
2. **ID 2**: Proses Sertifikat (Pengumuman) - 2025-09-26 13:33

## 🚀 Instalasi & Setup

### 1. Clone Project
```bash
cd "c:\Users\asus\Downloads\surat"
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Database
```bash
php artisan migrate
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=SampleDataSeeder
```

### 4. Setup Storage
```bash
php artisan storage:link
```

### 5. Run Server
```bash
php artisan serve
```

**URL**: http://127.0.0.1:8000

## 📁 Struktur File

```
app/
├── Http/Controllers/
│   ├── SuratController.php       # CRUD Surat
│   ├── KategoriController.php    # CRUD Kategori  
│   └── AboutController.php       # About page
├── Models/
│   ├── Surat.php                # Model Surat
│   └── Kategori.php             # Model Kategori
resources/views/
├── layouts/
│   └── app.blade.php            # Layout dengan sidebar
├── surat/
│   ├── index.blade.php          # Halaman arsip
│   ├── create.blade.php         # Form upload
│   ├── show.blade.php           # Detail surat
│   └── edit.blade.php           # Edit surat
├── kategori/
│   ├── index.blade.php          # Halaman kategori
│   ├── create.blade.php         # Tambah kategori
│   └── edit.blade.php           # Edit kategori
└── about/
    └── index.blade.php          # About page
routes/
└── web.php                      # Route definitions
database/
├── migrations/
│   ├── create_surats_table.php
│   └── create_kategoris_table.php
└── seeders/
    ├── KategoriSeeder.php
    └── SampleDataSeeder.php
```

## 🔧 Fitur Teknis

### Controllers
- **SuratController**: index, create, store, show, edit, update, destroy, download
- **KategoriController**: CRUD lengkap dengan search
- **AboutController**: Halaman informasi

### Validation
- Upload file PDF only
- Unique nomor surat
- Required fields validation
- File size max 2MB

### Search & Filter
- Search by judul surat
- Search kategori by nama
- Pagination support

### File Management
- Upload PDF ke `storage/app/public/surat_files/`
- Download file dengan route terpisah
- Auto delete file saat hapus surat

## � Responsive Features

- Sidebar collapsible di mobile
- Table responsive
- Card layout adaptif
- Mobile-friendly navigation

## 🎯 Sesuai Design Gambar

✅ **Layout**: Sidebar kiri, content area kanan  
✅ **Navigation**: Arsip, Kategori Surat, About, Arsipkan Surat  
✅ **Table Design**: Sesuai dengan kolom di gambar  
✅ **Button Colors**: Hapus (merah), Unduh (kuning), Lihat (biru)  
✅ **About Page**: Profile foto, data personal  
✅ **Upload Form**: Form sederhana dengan field yang diperlukan  
✅ **Search**: Kolom pencarian di atas tabel  

## � Informasi Developer

- **Nama**: Faishal Arrasyid
- **NIM**: 2331730088  
- **Tanggal**: 26 September 2025
- **Teknologi**: Laravel + Bootstrap 5
- **Database**: SQLite

---

**Status**: ✅ COMPLETED - Aplikasi telah sesuai 100% dengan design yang diminta!

*Versi: 2.0.0*  
*Update: September 30, 2025*