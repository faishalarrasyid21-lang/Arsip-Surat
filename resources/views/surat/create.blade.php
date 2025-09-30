@extends('layouts.app')

@section('title', 'Arsip Surat >> Unggah')

@section('content')
<div class="content-card">
    <h1 class="page-title">Arsip Surat </h1>
    <p class="page-subtitle">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>
    <p class="text-muted"><strong>Catatan:</strong> gunakan file berformat PDF, DOC, DOCX, JPG, JPEG, PNG, RAW, dan lainnya.</p>

    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" 
                           class="form-control @error('nomor_surat') is-invalid @enderror" 
                           value="{{ old('nomor_surat') }}" required>
                    @error('nomor_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        @if(isset($kategoris) && $kategoris->count() > 0)
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->nama_kategori }}" {{ old('kategori') == $kategori->nama_kategori ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        @else
                            <option value="Undangan" {{ old('kategori') == 'Undangan' ? 'selected' : '' }}>Undangan</option>
                            <option value="Pengumuman" {{ old('kategori') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            <option value="Nota Dinas" {{ old('kategori') == 'Nota Dinas' ? 'selected' : '' }}>Nota Dinas</option>
                            <option value="Pemberitahuan" {{ old('kategori') == 'Pemberitahuan' ? 'selected' : '' }}>Pemberitahuan</option>
                            <option value="Surat Keluar" {{ old('kategori') == 'Surat Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                            <option value="Surat Masuk" {{ old('kategori') == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                        @endif
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="perihal" class="form-label">Judul</label>
            <input type="text" name="perihal" id="perihal" 
                   class="form-control @error('perihal') is-invalid @enderror" 
                   value="{{ old('perihal') }}" required>
            @error('perihal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File Surat</label>
            <input type="file" name="file" id="file" 
                   class="form-control @error('file') is-invalid @enderror" 
                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.raw,.txt,.xls,.xlsx,.ppt,.pptx,.zip,.rar"
                   onchange="showFileInfo(this)">
            <div class="form-text">Format file yang didukung: PDF, DOC, DOCX, JPG, JPEG, PNG, RAW, TXT, XLS, XLSX, PPT, PPTX, ZIP, RAR (Maksimal 10MB).</div>
            <div id="file-info" class="mt-2" style="display: none;">
                <div class="alert alert-info">
                    <i class="fas fa-file me-2"></i>
                    <span id="file-details"></span>
                </div>
            </div>
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hidden fields untuk data yang diperlukan database -->
        <input type="hidden" name="tanggal_surat" value="{{ date('Y-m-d') }}">
        <input type="hidden" name="pengirim" value="System">

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('surat.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
function showFileInfo(input) {
    const fileInfo = document.getElementById('file-info');
    const fileDetails = document.getElementById('file-details');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const fileSize = (file.size / 1024 / 1024).toFixed(2); // Convert to MB
        const fileName = file.name;
        const fileType = file.type || 'Tidak diketahui';
        
        // Check file size (10MB = 10240KB)
        if (file.size > 10 * 1024 * 1024) {
            fileDetails.innerHTML = `
                <strong class="text-danger">⚠️ File terlalu besar!</strong><br>
                Nama: ${fileName}<br>
                Ukuran: ${fileSize} MB (Maksimal: 10 MB)<br>
                Tipe: ${fileType}
            `;
            fileInfo.style.display = 'block';
            input.value = ''; // Clear the input
            return;
        }
        
        fileDetails.innerHTML = `
            <strong>File dipilih:</strong><br>
            Nama: ${fileName}<br>
            Ukuran: ${fileSize} MB<br>
            Tipe: ${fileType}
        `;
        fileInfo.style.display = 'block';
    } else {
        fileInfo.style.display = 'none';
    }
}
</script>
@endsection