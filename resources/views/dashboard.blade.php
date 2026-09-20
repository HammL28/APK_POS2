@extends('layouts.app')

@section('title', 'Dashboard Performance')

@section('content')

@include('layouts.navbar')

<div class="dashboard-shell min-vh-100 py-4 py-lg-5">
    <div class="container-fluid px-3 px-lg-4">
        <div class="dashboard-hero card border-0 rounded-4 shadow-sm overflow-hidden mb-4">
            <div class="card-body p-4 p-lg-5 position-relative">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill badge-soft mb-3">
                            <i class="bi bi-speedometer2"></i>
                            <span class="small fw-semibold">Live POS Analytics</span>
                        </div>
                        <h2 class="h2 fw-bold mb-2 text-white">Selamat Datang</h2>
                        <p class="text-white-50 mb-0 d-flex align-items-center gap-2 flex-wrap">
                            <i class="bi bi-calendar-check text-info"></i>
                            <span>{{ $tanggalHariIni->translatedFormat('l, d F Y') }}</span>
                        </p>
                    </div>

                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="chip chip-glass">
                            <i class="bi bi-currency-dollar"></i>
                            Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}
                        </span>
                        <span class="chip chip-success">
                            <i class="bi bi-circle-fill"></i>
                            System Online
                        </span>
                    </div>
                </div>
            </div>
        </div>

        @can('viewAny', App\Models\User::class)
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card border-0 h-100">
                        <div class="card-body p-3 p-md-4 d-flex align-items-center gap-3">
                            <div class="metric-icon bg-primary-subtle text-primary">
                                <i class="bi bi-wallet2"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="metric-label">Total Penjualan</span>
                                <h4 class="metric-value mb-0">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card border-0 h-100">
                        <div class="card-body p-3 p-md-4 d-flex align-items-center gap-3">
                            <div class="metric-icon bg-success-subtle text-success">
                                <i class="bi bi-receipt"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="metric-label">Jumlah Transaksi</span>
                                <h4 class="metric-value mb-0">{{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card border-0 h-100">
                        <div class="card-body p-3 p-md-4 d-flex align-items-center gap-3">
                            <div class="metric-icon bg-info-subtle text-info">
                                <i class="bi bi-cash-stack"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="metric-label">Tunai</span>
                                <h4 class="metric-value mb-0">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="metric-card card border-0 h-100">
                        <div class="card-body p-3 p-md-4 d-flex align-items-center gap-3">
                            <div class="metric-icon bg-warning-subtle text-warning">
                                <i class="bi bi-qr-code-scan"></i>
                            </div>
                            <div class="overflow-hidden">
                                <span class="metric-label">Non-Tunai</span>
                                <h4 class="metric-value mb-0">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <div class="row g-3 mb-4">
            <div class="col-12 col-xl-6">
                <div class="content-card card border-0 h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="panel-icon warning">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0">Stok Menipis</h6>
                        </div>
                        <span class="badge badge-warning-soft">Warning</span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="table-responsive flex-grow-1">
                            <table class="table align-middle mb-0">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col" class="text-end">Sisa Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produkStokRendah as $index => $produk)
                                        <tr>
                                            <td class="text-muted small">{{ $produkStokRendah->firstItem() + $index }}</td>
                                            <td class="fw-semibold text-dark">{{ $produk->nama }}</td>
                                            <td class="text-end">
                                                <span class="status-badge warning">
                                                    {{ $produk->stok }} unit
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-4">
                                                <i class="bi bi-check-circle-fill text-success fs-3 d-block mb-1"></i>
                                                Semua stok masih aman.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($produkStokRendah->hasPages())
                            <div class="mt-3 pt-3 border-top border-light">
                                {{ $produkStokRendah->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-6">
                <div class="content-card card border-0 h-100">
                    <div class="card-header bg-white border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="panel-icon danger">
                                <i class="bi bi-x-circle-fill"></i>
                            </div>
                            <h6 class="fw-bold text-dark mb-0">Stok Habis</h6>
                        </div>
                        <span class="badge badge-danger-soft">Critical</span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="table-responsive flex-grow-1">
                            <table class="table align-middle mb-0">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col" class="text-end">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produkStokHabis as $index => $produk)
                                        <tr>
                                            <td class="text-muted small">{{ $produkStokHabis->firstItem() + $index }}</td>
                                            <td class="fw-semibold text-dark">{{ $produk->nama }}</td>
                                            <td class="text-end">
                                                <span class="status-badge danger">Habis</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted py-4">
                                                <i class="bi bi-check-circle-fill text-success fs-3 d-block mb-1"></i>
                                                Tidak ada produk yang habis.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if($produkStokHabis->hasPages())
                            <div class="mt-3 pt-3 border-top border-light">
                                {{ $produkStokHabis->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 content-card mb-4">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <div class="panel-icon success">
                        <i class="bi bi-trophy-fill"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Produk Terlaris Hari Ini</h6>
                </div>
                <span class="badge badge-success-soft">Top Performer</span>
            </div>

            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Stok Tersisa</th>
                                <th scope="col" class="text-end">Total Terjual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkTerlaris as $produk)
                                <tr>
                                    <td class="fw-semibold text-dark">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="rank-badge">{{ $loop->iteration }}</span>
                                            {{ $produk->nama }}
                                        </div>
                                    </td>
                                    <td class="text-secondary">{{ $produk->stok }} unit</td>
                                    <td class="text-end">
                                        <span class="status-badge success">
                                            <i class="bi bi-graph-up me-1"></i>{{ $produk->total_terjual }} Terjual
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="bi bi-inbox text-muted fs-2 d-block mb-1 opacity-50"></i>
                                        Belum ada transaksi penjualan tercatat hari ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
        overflow: hidden;
    }

    .dashboard-hero::after {
        content: "";
        position: absolute;
        inset: -25% -10% auto auto;
        width: 240px;
        height: 240px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        filter: blur(6px);
    }

    .badge-soft {
        background: rgba(255, 255, 255, 0.12);
        color: #e2e8f0;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .chip {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1rem;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid transparent;
    }

    .chip-glass {
        background: rgba(255, 255, 255, 0.1);
        color: #f8fafc;
        border-color: rgba(255, 255, 255, 0.18);
    }

    .chip-success {
        background: rgba(16, 185, 129, 0.15);
        color: #d1fae5;
        border-color: rgba(16, 185, 129, 0.3);
    }

    .metric-card,
    .content-card {
        border-radius: 1.25rem !important;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .metric-card:hover,
    .content-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);
    }

    .metric-icon {
        width: 56px;
        height: 56px;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .metric-label {
        display: block;
        font-size: 0.68rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #6b7280;
        font-weight: 700;
        margin-bottom: 0.35rem;
    }

    .metric-value {
        font-size: clamp(1rem, 2vw, 1.45rem);
        line-height: 1.2;
        font-weight: 800;
        color: #0f172a;
    }

    .panel-icon {
        width: 40px;
        height: 40px;
        border-radius: 0.85rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
    }

    .panel-icon.warning {
        background: rgba(251, 191, 36, 0.12);
        color: #b45309;
    }

    .panel-icon.danger {
        background: rgba(239, 68, 68, 0.12);
        color: #dc2626;
    }

    .panel-icon.success {
        background: rgba(34, 197, 94, 0.12);
        color: #15803d;
    }

    .badge-warning-soft,
    .badge-danger-soft,
    .badge-success-soft {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        padding: 0.5rem 0.8rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.04em;
    }

    .badge-warning-soft {
        background: rgba(251, 191, 36, 0.12);
        color: #b45309;
    }

    .badge-danger-soft {
        background: rgba(239, 68, 68, 0.12);
        color: #b91c1c;
    }

    .badge-success-soft {
        background: rgba(34, 197, 94, 0.12);
        color: #15803d;
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

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 84px;
        padding: 0.5rem 0.7rem;
        border-radius: 999px;
        font-size: 0.72rem;
        font-weight: 700;
    }

    .status-badge.warning {
        background: rgba(251, 191, 36, 0.12);
        color: #a16207;
    }

    .status-badge.danger {
        background: rgba(239, 68, 68, 0.12);
        color: #b91c1c;
    }

    .status-badge.success {
        background: rgba(34, 197, 94, 0.12);
        color: #15803d;
    }

    .rank-badge {
        display: inline-flex;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        align-items: center;
        justify-content: center;
        background: rgba(15, 23, 42, 0.08);
        color: #0f172a;
        font-size: 0.8rem;
        font-weight: 800;
    }
</style>

@endsection