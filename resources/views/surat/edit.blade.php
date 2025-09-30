@extends('layouts.app')

@section('title', 'Edit Surat')

@section('content')
<div class="header-section">
    <h2><i class="fas fa-edit me-2"></i>Edit Surat</h2>
    <p class="text-muted">Ubah informasi surat</p>
</div>

<form method="POST" action="{{ route('surat.update', $surat) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Surat <span class="text-danger">*</span></label>
                <select name="kategori" id="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                    <option value="">Pilih Kategori</option>
                    @if(isset($kategoris) && $kategoris->count() > 0)
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->nama_kategori }}" {{ (old('kategori') ?? $surat->kategori) == $kategori->nama_kategori ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    @else
                        <option value="Undangan" {{ (old('kategori') ?? $surat->kategori) == 'Undangan' ? 'selected' : '' }}>Undangan</option>
                        <option value="Pengumuman" {{ (old('kategori') ?? $surat->kategori) == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Nota Dinas" {{ (old('kategori') ?? $surat->kategori) == 'Nota Dinas' ? 'selected' : '' }}>Nota Dinas</option>
                        <option value="Pemberitahuan" {{ (old('kategori') ?? $surat->kategori) == 'Pemberitahuan' ? 'selected' : '' }}>Pemberitahuan</option>
                        <option value="Surat Keluar" {{ (old('kategori') ?? $surat->kategori) == 'Surat Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                        <option value="Surat Masuk" {{ (old('kategori') ?? $surat->kategori) == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                    @endif
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">Nomor Surat <span class="text-danger">*</span></label>
                <input type="text" name="nomor_surat" id="nomor_surat" 
                       class="form-control @error('nomor_surat') is-invalid @enderror" 
                       value="{{ old('nomor_surat') ?? $surat->nomor_surat }}" required>
                @error('nomor_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" 
                       class="form-control @error('tanggal_surat') is-invalid @enderror" 
                       value="{{ old('tanggal_surat') ?? $surat->tanggal_surat->format('Y-m-d') }}" required>
                @error('tanggal_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="pengirim" class="form-label">Pengirim <span class="text-danger">*</span></label>
                <input type="text" name="pengirim" id="pengirim" 
                       class="form-control @error('pengirim') is-invalid @enderror" 
                       value="{{ old('pengirim') ?? $surat->pengirim }}" required>
                @error('pengirim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="perihal" class="form-label">Perihal <span class="text-danger">*</span></label>
        <input type="text" name="perihal" id="perihal" 
               class="form-control @error('perihal') is-invalid @enderror" 
               value="{{ old('perihal') ?? $surat->perihal }}" required>
        @error('perihal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3" 
                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') ?? $surat->keterangan }}</textarea>
        @error('keterangan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Upload File Baru</label>
        @if($surat->file_path)
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>
                File saat ini: <strong>{{ basename($surat->file_path) }}</strong>
                <a href="{{ route('surat.download', $surat) }}" class="btn btn-sm btn-outline-primary ms-2">
                    <i class="fas fa-download"></i> Unduh
                </a>
            </div>
        @endif
        <input type="file" name="file" id="file" 
               class="form-control @error('file') is-invalid @enderror" 
               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.raw,.txt,.xls,.xlsx,.ppt,.pptx,.zip,.rar,.bmp,.gif,.tiff,.webp"
               onchange="showFileInfo(this)">
        <div class="form-text">Format file yang didukung: PDF, DOC, DOCX, JPG, JPEG, PNG, RAW, TXT, XLS, XLSX, PPT, PPTX, ZIP, RAR, BMP, GIF, TIFF, WEBP (Maksimal 10MB). Kosongkan jika tidak ingin mengubah file.</div>
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

    <hr class="my-4">

    <h5><i class="fas fa-user me-2"></i>Informasi Pengarsip</h5>
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_anda" class="form-label">Nama Anda</label>
                <input type="text" name="nama_anda" id="nama_anda" 
                       class="form-control @error('nama_anda') is-invalid @enderror" 
                       value="{{ old('nama_anda') ?? $surat->nama_anda }}">
                @error('nama_anda')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="nim_anda" class="form-label">NIM Anda</label>
                <input type="text" name="nim_anda" id="nim_anda" 
                       class="form-control @error('nim_anda') is-invalid @enderror" 
                       value="{{ old('nim_anda') ?? $surat->nim_anda }}">
                @error('nim_anda')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('surat.show', $surat) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Kembali
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i>Update Surat
        </button>
    </div>
</form>

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