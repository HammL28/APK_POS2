@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')

@include('layouts.navbar')

<div class="dashboard-shell min-vh-100 py-3 py-md-4 w-100">
    <div class="container-fluid px-3 px-md-4">

        <div class="card border-0 rounded-4 shadow-sm overflow-hidden mb-4 dashboard-hero">
            <div class="card-body p-4 position-relative z-1 text-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill badge-soft mb-2">
                            <i class="bi bi-person-plus-fill text-info"></i>
                            <span class="small fw-semibold">User Management</span>
                        </div>
                        <h2 class="h3 fw-bold mb-1 text-white">Tambah User Baru</h2>
                        <p class="text-white-50 small mb-0">Daftarkan pengguna baru untuk memberikan hak akses ke dalam sistem POS.</p>
                    </div>
                    <div>
                        <a href="{{ route('admin.users') }}" class="btn btn-outline-light rounded-pill px-3 py-2 fs-7">
                            <i class="bi bi-arrow-left me-1"></i> Batal & Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="position-absolute end-0 bottom-0 opacity-10 me-n3 mb-n3 d-none d-md-block" style="pointer-events: none;">
                <i class="bi bi-person-gear display-1 text-white"></i>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden form-card">
                    <div class="card-header bg-white border-bottom border-light-subtle py-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="form-header-icon">
                                <i class="bi bi-person-vcard"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark mb-0 fs-6">Formulir Pendaftaran User</h5>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            @include('users._form')
                        </form>
                    </div>
                </div>
            </div>
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

    .form-card {
        border-radius: 1.5rem !important;
    }

    .form-header-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0.9rem;
        background: rgba(13, 110, 253, 0.1);
        color: #0d6efd;
    }

    .fs-7 {
        font-size: 0.85rem;
    }
</style>

@endsection