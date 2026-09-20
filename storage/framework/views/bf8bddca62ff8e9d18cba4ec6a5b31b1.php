

<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="bg-body-tertiary min-vh-100 py-4 py-md-5">
    <div class="container px-3 px-md-4">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9 col-xl-8">
                <section class="card border-0 rounded-4 shadow-sm overflow-hidden">
                    <div class="p-4 p-md-5 text-white"
                         style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 70%, #155e75 100%);">
                        <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-end gap-3">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-25 border border-info border-opacity-50"
                                 style="width: 92px; height: 92px;">
                                <span class="display-5 fw-bold text-info">
                                    <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                                </span>
                            </div>
                            <div class="text-center text-sm-start">
                                <span class="badge rounded-pill bg-info bg-opacity-25 text-info border border-info border-opacity-25 mb-2 px-3 py-2">
                                    <i class="bi bi-person-badge me-1"></i> Profile Pengguna
                                </span>
                                <h1 class="h3 fw-bold mb-1"><?php echo e(Auth::user()->name); ?></h1>
                                <p class="text-white-50 mb-0">
                                    <?php echo e(ucfirst(Auth::user()->role?->name ?? 'Pengguna')); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4 p-md-5">
                        <h2 class="h5 fw-bold mb-4">Informasi Akun</h2>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="rounded-3 bg-body-tertiary p-3 h-100">
                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-person me-1"></i> Nama Lengkap
                                    </div>
                                    <div class="fw-semibold text-dark"><?php echo e(Auth::user()->name); ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rounded-3 bg-body-tertiary p-3 h-100">
                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-envelope me-1"></i> Email
                                    </div>
                                    <div class="fw-semibold text-dark text-break"><?php echo e(Auth::user()->email); ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rounded-3 bg-body-tertiary p-3 h-100">
                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-shield-check me-1"></i> Role
                                    </div>
                                    <div class="fw-semibold text-dark"><?php echo e(ucfirst(Auth::user()->role?->name ?? 'Pengguna')); ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="rounded-3 bg-body-tertiary p-3 h-100">
                                    <div class="text-muted small mb-1">
                                        <i class="bi bi-calendar-check me-1"></i> Bergabung Sejak
                                    </div>
                                    <div class="fw-semibold text-dark">
                                        <?php echo e(Auth::user()->created_at?->translatedFormat('d F Y') ?? '-'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 border-top mt-4 pt-4">
                            <p class="text-muted small mb-0">
                                <i class="bi bi-info-circle me-1"></i>
                                Data profile Anda digunakan untuk keperluan akun POS.
                            </p>
                            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views\profile.blade.php ENDPATH**/ ?>