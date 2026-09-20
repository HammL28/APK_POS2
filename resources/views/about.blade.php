@extends('layouts.app')

@section('title', 'Tentang Toko')

@section('content')

@include('layouts.navbar')

<main class="bg-body-tertiary min-vh-100 py-4 py-md-5">
    <div class="container px-3 px-md-4">
        <section class="card border-0 rounded-4 shadow-sm overflow-hidden mb-4"
                 style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 68%, #155e75 100%);">
            <div class="card-body p-4 p-md-5 text-white position-relative">
                <div class="row align-items-center g-4 position-relative" style="z-index: 1;">
                    <div class="col-lg-8">
                        <span class="badge rounded-pill bg-info bg-opacity-25 text-info border border-info border-opacity-25 px-3 py-2 mb-3">
                            <i class="bi bi-stars me-1"></i> Sistem Kasir Modern
                        </span>
                        <h1 class="display-5 fw-bold mb-3">Kelola Toko Lebih Mudah</h1>
                        <p class="lead text-white-50 mb-4">
                            POS System adalah solusi sederhana dan praktis untuk membantu
                            mengelola operasional toko setiap hari.
                        </p>
                        <a href="{{ route('dashboard') }}" class="btn btn-info text-dark fw-semibold rounded-pill px-4 py-2">
                            <i class="bi bi-grid-1x2 me-2"></i> Buka Dashboard
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle border border-info border-opacity-25 bg-info bg-opacity-10"
                             style="width: 170px; height: 170px;">
                            <i class="bi bi-shop text-info" style="font-size: 6rem;"></i>
                        </div>
                    </div>
                </div>
                <i class="bi bi-bar-chart-line position-absolute text-white opacity-10"
                   style="font-size: 13rem; right: -20px; bottom: -75px;"></i>
            </div>
        </section>

        <div class="row g-4">
            <div class="col-lg-7">
                <section class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary"
                                 style="width: 48px; height: 48px;">
                                <i class="bi bi-info-circle fs-4"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-1">Tentang POS System</h2>
                                <p class="text-muted mb-0 small">Partner untuk operasional toko Anda</p>
                            </div>
                        </div>
                        <p class="text-secondary lh-lg mb-3">
                            Dengan satu sistem terintegrasi, Anda dapat mencatat produk,
                            mengatur stok, mengelompokkan jenis produk, dan memproses
                            transaksi penjualan dengan lebih cepat.
                        </p>
                        <p class="text-secondary lh-lg mb-0">
                            Data tersusun rapi sehingga pemilik toko dan kasir dapat bekerja
                            lebih efisien serta mengambil keputusan berdasarkan informasi
                            penjualan yang jelas.
                        </p>
                    </div>
                </section>
            </div>

            <div class="col-lg-5">
                <section class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h5 fw-bold mb-4">Fitur Utama</h2>
                        <div class="d-flex gap-3 mb-4">
                            <i class="bi bi-box-seam text-primary fs-4"></i>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Manajemen Produk</h3>
                                <p class="text-muted small mb-0">Kelola harga, stok, foto, dan jenis produk.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-4">
                            <i class="bi bi-receipt text-success fs-4"></i>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Transaksi Teratur</h3>
                                <p class="text-muted small mb-0">Catat penjualan dengan proses yang cepat dan praktis.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <i class="bi bi-graph-up-arrow text-info fs-4"></i>
                            <div>
                                <h3 class="h6 fw-bold mb-1">Ringkasan Penjualan</h3>
                                <p class="text-muted small mb-0">Pantau performa toko melalui dashboard informatif.</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="text-center text-muted small mt-4">
            <i class="bi bi-shield-check text-success me-1"></i>
            Dibuat untuk membantu toko bekerja lebih cepat, rapi, dan efisien.
        </div>
    </div>
</main>

@endsection
