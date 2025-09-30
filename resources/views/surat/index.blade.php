@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')
<div class="content-card">
    <h1 class="page-title">Arsip Surat</h1>
    <p class="page-subtitle">Masukkan kata kunci pada kolom pencarian di bawah ini untuk mencari surat berdasarkan judul. Sistem akan menampilkan data surat yang sesuai dengan kata kunci yang Anda masukkan.</p>

    <!-- Search Form -->
    <div class="search-form">
        <form method="GET" action="{{ route('surat.index') }}" class="row g-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari judul surat..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search me-2"></i>Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Waktu Pengarsipan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($surats as $surat)
                    <tr>
                        <td>{{ $surat->id }}</td>
                        <td>{{ $surat->kategori }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>{{ $surat->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm me-1" onclick="confirmDelete({{ $surat->id }})">
                                Hapus
                            </button>
                            @if($surat->file_path)
                                <a href="{{ route('surat.download', $surat) }}" class="btn btn-warning btn-sm me-1" title="{{ \App\Helpers\FileHelper::getType(basename($surat->file_path)) }}">
                                    <i class="{{ \App\Helpers\FileHelper::getIcon(basename($surat->file_path)) }} me-1"></i>Unduh
                                </a>
                            @else
                                <span class="text-muted small">No file</span>
                            @endif
                            <a href="{{ route('surat.show', $surat) }}" class="btn btn-primary btn-sm">
                                Lihat >>
                            </a>
                            <form id="delete-form-{{ $surat->id }}" action="{{ route('surat.destroy', $surat) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">Belum ada data surat</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($surats->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $surats->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection