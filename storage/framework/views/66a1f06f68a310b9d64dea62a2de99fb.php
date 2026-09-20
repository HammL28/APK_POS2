

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="bg-body-tertiary min-vh-100 py-3 py-md-4 w-100">
    <div class="container-fluid px-3 px-md-4">
        
        <?php if(session('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?php echo e(session('errors')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 shadow-sm mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card border-0 rounded-4 shadow-sm overflow-hidden mb-4" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);">
            <div class="card-body p-4 position-relative z-1 text-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white bg-opacity-10 text-light mb-2 border border-white border-opacity-10">
                            <i class="bi bi-cart-check text-info"></i>
                            <span class="small fw-semibold">Transaction Management</span>
                        </div>
                        <h2 class="h3 fw-bold mb-1 text-white">Halaman Penjualan</h2>
                        <p class="text-white-50 small mb-0">Kelola riwayat transaksi, status pembayaran, dan rekap penjualan kasir.</p>
                    </div>
                    <div>
                        <a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-info fw-bold text-dark shadow-sm rounded-pill px-4 py-2 border-0">
                            <i class="bi bi-plus-lg me-1"></i> Transaksi Baru
                        </a>
                    </div>
                </div>
            </div>
            <div class="position-absolute end-0 bottom-0 opacity-10 me-n3 mb-n3 d-none d-md-block" style="pointer-events: none;">
                <i class="bi bi-receipt display-1 text-white"></i>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 bg-white mb-4 overflow-hidden">
            <div class="card-header bg-white border-0 pt-4 px-4 pb-3">
                <div class="row g-3 align-items-center justify-content-between">
                    <div class="col-12 col-md-6 col-lg-4">
                        <form action="<?php echo e(route('penjualan.index')); ?>" method="GET">
                            <div class="input-group rounded-pill overflow-hidden bg-body-tertiary border border-light-subtle">
                                <span class="input-group-text bg-transparent border-0 ps-3 text-secondary">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input 
                                    type="text" 
                                    name="search" 
                                    value="<?php echo e(request('search')); ?>" 
                                    class="form-control bg-transparent border-0 ps-2 fs-7 shadow-none text-dark" 
                                    placeholder="Search penjualan..."
                                >
                                <?php if(request('search')): ?>
                                    <a href="<?php echo e(route('penjualan.index')); ?>" class="btn bg-transparent border-0 text-secondary pe-2">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </a>
                                <?php endif; ?>
                                <button class="btn btn-dark px-4 fw-semibold fs-7 border-0" type="submit">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-12 col-md-auto text-secondary small fw-medium">
                        <span class="d-inline-block px-3 py-1 rounded-pill bg-light-subtle border">
                            <i class="bi bi-receipt-cutoff me-1 text-primary"></i> Total Transaksi: <strong class="text-dark"><?php echo e(method_exists($sales, 'total') ? $sales->total() : count($sales)); ?></strong>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light-subtle text-secondary small text-uppercase tracking-wider">
                            <tr>
                                <th scope="col" class="ps-4 py-3 fw-bold text-start" style="width: 5%;">#</th>
                                <th scope="col" class="py-3 fw-bold text-start" style="width: 18%;">Tanggal Transaksi</th>
                                <th scope="col" class="py-3 fw-bold text-start" style="width: 18%;">Kasir</th>
                                <th scope="col" class="py-3 fw-bold text-start" style="width: 18%;">Total Pembayaran</th>
                                <th scope="col" class="py-3 fw-bold text-start" style="width: 14%;">Metode</th>
                                <th scope="col" class="py-3 fw-bold text-start" style="width: 12%;">Status</th>
                                <th scope="col" class="pe-4 py-3 fw-bold text-start" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php if(count($sales) > 0): ?>
                                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="ps-4 text-muted text-start py-3 fs-7">
                                            <?php echo e(method_exists($sales, 'firstItem') ? $sales->firstItem() + $loop->index : $loop->iteration); ?>

                                        </td>

                                        <td class="py-3 text-start text-secondary fs-7 fw-medium">
                                            <i class="bi bi-calendar-event me-1 opacity-75"></i>
                                            <?php echo e(isset($sale->created_at) ? $sale->created_at->translatedFormat('d-m-Y H:i:s') : '-'); ?>

                                        </td>

                                        <td class="py-3 text-start fs-7">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="rounded-circle bg-secondary bg-opacity-10 text-secondary d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px;">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <span class="fw-semibold text-dark"><?php echo e($sale->user->name ?? 'Kasir System'); ?></span>
                                            </div>
                                        </td>

                                        <td class="py-3 text-start text-dark fw-bold fs-7">
                                            Rp <?php echo e(number_format($sale->total_pembayaran ?? 0, 0, ',', '.')); ?>

                                        </td>

                                        <td class="py-3 text-start fs-7">
                                            <span class="badge border border-secondary-subtle bg-light text-dark px-3 py-1.5 rounded-pill fw-medium">
                                                <i class="bi bi-credit-card me-1 text-muted"></i>
                                                <?php echo e(ucfirst($sale->metode_pembayaran ?? 'Cash')); ?>

                                            </span>
                                        </td>

                                        <td class="py-3 text-start">
                                            <?php
                                                $status = strtolower($sale->status ?? 'selesai');
                                            ?>
                                            <?php if(in_array($status, ['selesai', 'paid', 'lunas', 'success', 'completed'])): ?>
                                                <span class="badge border border-success-subtle bg-success-subtle text-success px-3 py-1.5 rounded-pill fw-semibold">
                                                    Completed
                                                </span>
                                            <?php elseif(in_array($status, ['pending', 'proses', 'open'])): ?>
                                                <span class="badge border border-warning-subtle bg-warning-subtle text-warning-emphasis px-3 py-1.5 rounded-pill fw-semibold">
                                                    Open
                                                </span>
                                            <?php else: ?>
                                                <span class="badge border border-danger-subtle bg-danger-subtle text-danger px-3 py-1.5 rounded-pill fw-semibold">
                                                    <?php echo e(ucfirst($status)); ?>

                                                </span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="pe-4 py-3 text-start">
                                            <div class="d-flex gap-1 justify-content-start align-items-center">
                                                <a href="<?php echo e(route('penjualan.show', $sale)); ?>" 
                                                   class="btn btn-sm btn-light border text-info-emphasis hover-action-btn rounded-circle p-2 d-inline-flex align-items-center justify-content-center" 
                                                   style="width: 36px; height: 36px;" 
                                                   title="Detail Penjualan">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>
                                                <a href="<?php echo e(route('penjualan.edit', $sale)); ?>" 
                                                   class="btn btn-sm btn-light border text-warning-emphasis hover-action-btn rounded-circle p-2 d-inline-flex align-items-center justify-content-center" 
                                                   style="width: 36px; height: 36px;" 
                                                   title="Edit Penjualan">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                                                <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>" method="POST" class="d-inline">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-light border text-danger hover-action-btn rounded-circle p-2 d-inline-flex align-items-center justify-content-center" 
                                                            style="width: 36px; height: 36px;" 
                                                            onclick="return confirm('Apakah Anda yakin akan menghapus penjualan ini?')" 
                                                            title="Hapus Penjualan">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-muted text-center py-5">
                                        <i class="bi bi-receipt-cutoff text-muted fs-1 d-block mb-2 opacity-50"></i>
                                        <span class="small fw-medium">Tidak ada data penjualan ditemukan.</span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if(method_exists($sales, 'hasPages') && $sales->hasPages()): ?>
                <div class="card-footer bg-white border-0 py-3 px-4">
                    <?php echo e($sales->links()); ?>

                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<style>
    .tracking-wider {
        letter-spacing: 0.06em;
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
    .table th, .table td {
        vertical-align: middle;
    }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views\penjualan\index.blade.php ENDPATH**/ ?>