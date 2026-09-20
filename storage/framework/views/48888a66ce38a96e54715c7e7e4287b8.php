

<?php $__env->startSection('title', 'Edit Jenis'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="dashboard-shell min-vh-100 py-3 py-md-4 w-100">
    <div class="container-fluid px-3 px-md-4">

        <div class="card border-0 rounded-4 shadow-sm overflow-hidden mb-4 dashboard-hero">
            <div class="card-body p-4 position-relative z-1 text-white">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill badge-soft mb-2">
                            <i class="bi bi-pencil-square text-info"></i>
                            <span class="small fw-semibold">Master Data</span>
                        </div>
                        <h2 class="h3 fw-bold mb-1 text-white">Edit Jenis</h2>
                        <p class="text-white-50 small mb-0">Perbarui data jenis agar tetap sesuai dengan kategori produk saat ini.</p>
                    </div>
                    <div>
                        <a href="<?php echo e(route('jenis.index')); ?>" class="btn btn-outline-light rounded-pill px-3 py-2 fs-7">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
            <div class="position-absolute end-0 bottom-0 opacity-10 me-n3 mb-n3 d-none d-md-block" style="pointer-events: none;">
                <i class="bi bi-tag display-1 text-white"></i>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden form-card">
                    <div class="card-header bg-white border-bottom border-light-subtle py-3 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="form-header-icon">
                                <i class="bi bi-pencil-fill"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark mb-0 fs-6">Update Jenis Produk</h5>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <form action="<?php echo e(route('jenis.update', ['jeni' => $jenis->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="mb-3">
                                <label for="nama_jenis" class="form-label fw-semibold">Nama Jenis</label>
                                <input type="text" name="nama_jenis" id="nama_jenis" class="form-control <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('nama_jenis', $jenis->nama_jenis)); ?>" style="border-radius: 0.9rem;">
                                <?php $__errorArgs = ['nama_jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" style="border-radius: 0.9rem;"><?php echo e(old('deskripsi', $jenis->deskripsi)); ?></textarea>
                                <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4 pt-3 border-top border-light-subtle">
                                <a href="<?php echo e(route('jenis.index')); ?>" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
                                    <i class="bi bi-check-circle me-1"></i> Update
                                </button>
                            </div>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS2\resources\views\jenis\edit.blade.php ENDPATH**/ ?>