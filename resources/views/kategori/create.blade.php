@extends('layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="content-card">
    <h1 class="page-title">Tambah Kategori Baru</h1>
    <p class="page-subtitle">Isi form di bawah ini untuk menambah kategori surat baru.</p>

    <form method="POST" action="{{ route('kategori.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" name="nama_kategori" id="nama_kategori" 
                   class="form-control @error('nama_kategori') is-invalid @enderror" 
                   value="{{ old('nama_kategori') }}" required>
            @error('nama_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3" 
                      class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i>Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection