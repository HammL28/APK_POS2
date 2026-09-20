@extends('layouts.app')

@section('title', 'Jenis')

@section('content')

@include('layouts.navbar')

<div class="dashboard-shell min-vh-100 py-3 py-md-4 w-100">
    <div class="container-fluid px-3 px-md-4">

        <div class="card border-0 rounded-4 shadow-sm overflow-hidden mb-4 dashboard-hero">
            <div class="card-body p-4 position-relative z-1 text-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill badge-soft mb-2">
                            <i class="bi bi-tags text-info"></i>
                            <span class="small fw-semibold">Master Data</span>
                        </div>
                        <h2 class="h3 fw-bold mb-1 text-white">Daftar Jenis</h2>
                        <p class="text-white-50 small mb-0">Kelola jenis produk agar stok dan kategori lebih terstruktur.</p>
                    </div>
                    <div>
                        <a href="{{ route('jenis.create') }}" class="btn btn-info fw-bold text-dark shadow-sm rounded-pill px-4 py-2 border-0">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Jenis
                        </a>
                    </div>
                </div>
            </div>
            <div class="position-absolute end-0 bottom-0 opacity-10 me-n3 mb-n3 d-none d-md-block" style="pointer-events: none;">
                <i class="bi bi-tag display-1 text-white"></i>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-3 border-0 shadow-sm mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger rounded-3 border-0 shadow-sm mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-12 col-md-6 col-lg-4">
                        <form action="{{ route('jenis.index') }}" method="GET">
                            <div class="input-group rounded-pill overflow-hidden bg-body-tertiary border border-light-subtle shadow-sm">
                                <span class="input-group-text bg-transparent border-0 ps-3 text-secondary">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control bg-transparent border-0 ps-2 fs-7 shadow-none text-dark" placeholder="Cari jenis...">
                                @if(request('search'))
                                    <a href="{{ route('jenis.index') }}" class="btn bg-transparent border-0 text-secondary pe-2">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </a>
                                @endif
                                <button class="btn btn-dark px-4 fw-semibold fs-7 border-0" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-12 col-md-auto text-secondary small fw-medium">
                        <span class="d-inline-block px-3 py-1 rounded-pill bg-light-subtle border border-light-subtle">
                            <i class="bi bi-database-check me-1 text-primary"></i> Total Jenis: <strong class="text-dark">{{ $jenis->total() }}</strong>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-head">
                            <tr>
                                <th scope="col" class="ps-4 py-3 fw-bold" style="width: 8%;">No</th>
                                <th scope="col" class="py-3 fw-bold" style="width: 26%;">Nama Jenis</th>
                                <th scope="col" class="py-3 fw-bold" style="width: 40%;">Deskripsi</th>
                                <th scope="col" class="pe-4 py-3 fw-bold text-end" style="width: 26%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jenis as $item)
                                <tr>
                                    <td class="ps-4 text-muted py-3 fs-7">{{ $jenis->firstItem() + $loop->index }}</td>
                                    <td class="py-3">
                                        <span class="fw-semibold text-dark">{{ $item->nama_jenis }}</span>
                                    </td>
                                    <td class="py-3 text-secondary fs-7">{{ $item->deskripsi ?: '-' }}</td>
                                    <td class="pe-4 py-3 text-end">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('jenis.edit', ['jeni' => $item->id]) }}" class="btn btn-sm btn-light border text-warning-emphasis hover-action-btn rounded-circle p-2 d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Edit Jenis">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="{{ route('jenis.destroy', ['jeni' => $item->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jenis ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light border text-danger hover-action-btn rounded-circle p-2 d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Hapus Jenis">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-tag text-muted fs-1 d-block mb-2 opacity-50"></i>
                                        <span class="small fw-medium">Belum ada data jenis.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($jenis->hasPages())
                <div class="card-footer bg-white border-0 py-3 px-4">
                    {{ $jenis->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .dashboard-shell {
        background: linear-gradient(180deg, #f3f6fb 0%, #eef4ff 100%);
    }

    .dashboard-hero {
        background: linear-gradient(135deg, #0f172a 0%, #111827 30%, #1d4ed8 100%);
        position: relative;
    }

    .badge-soft {
        background: rgba(255, 255, 255, 0.12);
        color: #e2e8f0;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .table-head th {
        background: #f8fafc;
        color: #64748b;
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 700;
        padding-top: 0.9rem;
        padding-bottom: 0.9rem;
    }

    .fs-7 {
        font-size: 0.85rem;
    }

    .hover-action-btn {
        transition: all 0.2s ease;
    }

    .hover-action-btn:hover {
        background-color: #0f172a !important;
        color: #ffffff !important;
        border-color: #0f172a !important;
        transform: translateY(-2px);
    }
</style>

@endsection