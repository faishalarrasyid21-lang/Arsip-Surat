@extends('layouts.app')

@section('title', 'Kategori Surat')

@section('content')
<div class="content-card">
    <h1 class="page-title">Kategori Surat</h1>
    <p class="page-subtitle">Berikut ini kategori yang bisa digunakan untuk melabeli surat. Klik <strong>Tambah</strong> untuk menambah kategori baru.</p>

    <!-- Search and Add Button -->
    <div class="search-form">
        <div class="row g-3">
            <div class="col-md-8">
                <form method="GET" action="{{ route('kategori.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari kategori..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary ms-2">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('kategori.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah Kategori Baru...
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama_kategori }}</td>
                        <td>{{ $kategori->keterangan ?: '-' }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm me-2" onclick="confirmDelete({{ $kategori->id }})">
                                Hapus
                            </button>
                            <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form id="delete-form-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">
                            <i class="fas fa-tags fa-3x text-muted mb-3 d-block"></i>
                            <span class="text-muted">Belum ada kategori</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($kategoris->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $kategoris->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection