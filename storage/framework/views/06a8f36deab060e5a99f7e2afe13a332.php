<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>

<div class="app-shell container-fluid p-0">

    <?php if(session('success')): ?>
        <div class="alert alert-success m-3">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="main-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</div>

<style>
    body {
        margin: 0;
        background: #eef2f6;
        font-family: 'Segoe UI', sans-serif;
    }

    .app-shell {
        min-height: 100vh;
        background: #eef2f6;
    }

    .main-content {
        margin-left: 250px;
        min-height: 100vh;
    }

    @media (max-width: 991.98px) {
        .main-content {
            margin-left: 0;
        }
    }
</style>

</body>
</html><?php /**PATH C:\laragon\www\APK_POS2\resources\views/layouts/app.blade.php ENDPATH**/ ?>