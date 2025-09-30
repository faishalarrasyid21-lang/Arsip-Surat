@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="content-card">
    <h1 class="page-title">About</h1>
    
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="profile-image mb-4">
                <img src="{{ asset('storage/profile.jpg') }}" 
                     alt="Profile Picture" 
                     class="rounded-circle" 
                     style="width: 200px; height: 200px; object-fit: cover; border: 5px solid #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.2);"
                     onerror="this.src='https://via.placeholder.com/200x200/667eea/ffffff?text=FP'">
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-borderless">
                <tr>
                    <td style="width: 200px;"><strong>Nama</strong></td>
                    <td>Faishal Arrasyid</td>
                </tr>
                <tr>
                    <td><strong>NIM</strong></td>
                    <td>2331730088</td>
                </tr>
                <tr>
                    <td><strong>Program Studi</strong></td>
                    <td>Teknik Informatika</td>
                </tr>
                <tr>
                    <td><strong>Universitas</strong></td>
                    <td>Politeknik Negeri Malang</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>faishalarrasyid21@gmail.com</td>
                </tr>
            </table>
            
            <p class="mt-4">
                Aplikasi Arsip Surat ini dibuat menggunakan Laravel Framework dengan Bootstrap untuk styling. 
                Aplikasi ini berfungsi untuk mengelola arsip surat-menyurat dengan fitur CRUD lengkap, 
                kategorisasi surat, dan sistem manajemen yang user-friendly.
            </p>
            
            <div class="mt-4">
                <h5><strong>Fitur-fitur Aplikasi:</strong></h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Manajemen Data Surat</li>
                    <li><i class="fas fa-check text-success me-2"></i>Kategorisasi Surat</li>
                    <li><i class="fas fa-check text-success me-2"></i>Upload Multi-Format File (PDF, DOC, JPG, PNG, RAW, dll)</li>
                    <li><i class="fas fa-check text-success me-2"></i>Interface Responsive</li>
                    <li><i class="fas fa-check text-success me-2"></i>Dashboard Informatif</li>
                    <li><i class="fas fa-check text-success me-2"></i>File Preview dengan Icon</li>
                    <li><i class="fas fa-check text-success me-2"></i>Validasi File Size (Max 10MB)</li>
                </ul>
                
                <div class="mt-3">
                    <h6><strong>Format File yang Didukung:</strong></h6>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">
                                <i class="fas fa-file-pdf text-danger me-1"></i>PDF Documents<br>
                                <i class="fas fa-file-word text-primary me-1"></i>Word Documents (DOC, DOCX)<br>
                                <i class="fas fa-file-excel text-success me-1"></i>Excel Spreadsheets (XLS, XLSX)<br>
                                <i class="fas fa-file-powerpoint text-warning me-1"></i>PowerPoint (PPT, PPTX)
                            </small>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">
                                <i class="fas fa-file-image text-info me-1"></i>Images (JPG, PNG, GIF, BMP, TIFF, WebP, RAW)<br>
                                <i class="fas fa-file-archive text-dark me-1"></i>Archives (ZIP, RAR)<br>
                                <i class="fas fa-file-alt text-secondary me-1"></i>Text Files (TXT)<br>
                                <i class="fas fa-file text-muted me-1"></i>Dan format lainnya
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <p class="mt-3 text-muted small">
                <em>Data yang tampil di sini diambil dari file 
                <code style="color: #e74c3c; background: #f8f9fa; padding: 2px 4px; border-radius: 4px;">.env</code> 
                dan foto di 
                <code style="color: #e74c3c; background: #f8f9fa; padding: 2px 4px; border-radius: 4px;">storage/app/public/profile.jpg</code>.</em>
            </p>
        </div>
    </div>
</div>
@endsection