@extends('layouts.app')

@section('title', 'Detail Surat')

@section('content')
<div class="header-section">
    <h2><i class="fas fa-file-alt me-2"></i>Detail Surat</h2>
    <p class="text-muted">Informasi lengkap tentang surat</p>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Surat</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Kategori:</strong></div>
                    <div class="col-sm-8">
                        <span class="badge bg-info fs-6">{{ $surat->kategori }}</span>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Nomor Surat:</strong></div>
                    <div class="col-sm-8">{{ $surat->nomor_surat }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Tanggal Surat:</strong></div>
                    <div class="col-sm-8">{{ $surat->tanggal_surat->format('d F Y') }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Perihal:</strong></div>
                    <div class="col-sm-8">{{ $surat->perihal }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Pengirim:</strong></div>
                    <div class="col-sm-8">{{ $surat->pengirim }}</div>
                </div>
                
                @if($surat->keterangan)
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>Keterangan:</strong></div>
                    <div class="col-sm-8">{{ $surat->keterangan }}</div>
                </div>
                @endif
                
                <div class="row mb-3">
                    <div class="col-sm-4"><strong>File Lampiran:</strong></div>
                    <div class="col-sm-8">
                        @if($surat->file_path)
                            <div class="d-flex align-items-center">
                                <i class="{{ \App\Helpers\FileHelper::getIcon(basename($surat->file_path)) }} me-2 fa-2x"></i>
                                <div>
                                    <div><strong>{{ basename($surat->file_path) }}</strong></div>
                                    <small class="text-muted">{{ \App\Helpers\FileHelper::getType(basename($surat->file_path)) }}</small>
                                    <div class="mt-2">
                                        <a href="{{ route('surat.download', $surat) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-download me-1"></i>Unduh File
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="text-muted">Tidak ada file lampiran</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        @if($surat->nama_anda || $surat->nim_anda)
        <div class="card mb-3">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0"><i class="fas fa-user me-2"></i>Informasi Pengarsip</h6>
            </div>
            <div class="card-body">
                @if($surat->nama_anda)
                <p><strong>Nama:</strong> {{ $surat->nama_anda }}</p>
                @endif
                @if($surat->nim_anda)
                <p><strong>NIM:</strong> {{ $surat->nim_anda }}</p>
                @endif
            </div>
        </div>
        @endif
        
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h6 class="mb-0"><i class="fas fa-clock me-2"></i>Informasi Sistem</h6>
            </div>
            <div class="card-body">
                <p><strong>Dibuat:</strong><br>{{ $surat->created_at->format('d F Y, H:i') }}</p>
                @if($surat->updated_at != $surat->created_at)
                <p><strong>Diupdate:</strong><br>{{ $surat->updated_at->format('d F Y, H:i') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between mt-4">
    <a href="{{ route('surat.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left me-1"></i>Kembali ke Daftar
    </a>
    <div>
        <a href="{{ route('surat.edit', $surat) }}" class="btn btn-warning">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <form method="POST" action="{{ route('surat.destroy', $surat) }}" style="display: inline;" class="ms-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                <i class="fas fa-trash me-1"></i>Hapus
            </button>
        </form>
    </div>
</div>
@endsection