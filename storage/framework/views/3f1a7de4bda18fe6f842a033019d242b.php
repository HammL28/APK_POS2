<aside class="app-sidebar">
    <div class="sidebar-brand">
        <a href="<?php echo e(route('about')); ?>" class="brand-link" title="Tentang Toko">
            <div class="brand-icon">
                <i class="bi bi-shop"></i>
            </div>
            <div>
                <span class="brand-name">POS System</span>
                <small class="brand-subtitle">Admin Panel</small>
            </div>
        </a>
    </div>

    <nav class="sidebar-nav" aria-label="Sidebar navigation">
        <a class="nav-item <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
            <i class="bi bi-grid-1x2"></i>
            <span>Dashboard</span>
        </a>

        <?php if(Auth::check() && Auth::user()->role?->name === 'admin'): ?>
            <a class="nav-item <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users')); ?>">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>

            <a class="nav-item <?php echo e(Request::is('jenis*') ? 'active' : ''); ?>" href="<?php echo e(route('jenis.index')); ?>">
                <i class="bi bi-tags"></i>
                <span>Jenis</span>
            </a>
        <?php endif; ?>

        <a class="nav-item <?php echo e(Request::is('produk*') ? 'active' : ''); ?>" href="<?php echo e(route('produk.index')); ?>">
            <i class="bi bi-box-seam"></i>
            <span>Produk</span>
        </a>

        <a class="nav-item <?php echo e(Request::is('penjualan*') ? 'active' : ''); ?>" href="<?php echo e(route('penjualan.index')); ?>">
            <i class="bi bi-cart3"></i>
            <span>Penjualan</span>
        </a>
    </nav>

    <div class="sidebar-footer">
        <?php if(Auth::check()): ?>
            <a href="<?php echo e(route('profile')); ?>" class="profile-pill <?php echo e(Request::is('profile') ? 'active' : ''); ?>">
                <i class="bi bi-person-circle"></i>
                <span><?php echo e(Auth::user()->name); ?></span>
            </a>
        <?php endif; ?>

        <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form">
            <?php echo csrf_field(); ?>
            <button type="submit" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<style>
    .app-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: linear-gradient(180deg, #0f172a 0%, #111827 100%);
        border-right: 1px solid rgba(148, 163, 184, 0.2);
        box-shadow: 10px 0 30px rgba(15, 23, 42, 0.18);
        display: flex;
        flex-direction: column;
        padding: 1.25rem 0.9rem 1rem;
        z-index: 1030;
    }

    .sidebar-brand {
        padding: 0.5rem 0.5rem 1rem;
        border-bottom: 1px solid rgba(148, 163, 184, 0.18);
        margin-bottom: 1rem;
    }

    .brand-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        color: #fff;
    }

    .brand-icon {
        width: 42px;
        height: 42px;
        border-radius: 0.9rem;
        background: rgba(59, 130, 246, 0.15);
        border: 1px solid rgba(96, 165, 250, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #7dd3fc;
        font-size: 1.1rem;
    }

    .brand-name {
        display: block;
        font-weight: 700;
        font-size: 1rem;
        line-height: 1.2;
    }

    .brand-subtitle {
        display: block;
        color: rgba(226, 232, 240, 0.7);
        letter-spacing: 0.06em;
        text-transform: uppercase;
        font-size: 0.62rem;
    }

    .sidebar-nav {
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
        flex: 1;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        color: rgba(226, 232, 240, 0.8);
        text-decoration: none;
        padding: 0.8rem 0.9rem;
        border-radius: 0.9rem;
        font-size: 0.92rem;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .nav-item:hover,
    .nav-item.active {
        background: rgba(255, 255, 255, 0.12);
        color: #ffffff;
        transform: translateX(2px);
        box-shadow: inset 0 0 0 1px rgba(255,255,255,0.04);
    }

    .nav-item i {
        width: 18px;
        text-align: center;
        font-size: 1rem;
    }

    .sidebar-footer {
        padding-top: 1rem;
        border-top: 1px solid rgba(148, 163, 184, 0.18);
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .profile-pill {
        display: flex;
        align-items: center;
        gap: 0.7rem;
        color: rgba(226, 232, 240, 0.9);
        text-decoration: none;
        padding: 0.7rem 0.8rem;
        border-radius: 0.9rem;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(148, 163, 184, 0.15);
        font-weight: 600;
        font-size: 0.85rem;
    }

    .profile-pill.active,
    .profile-pill:hover {
        color: #fff;
        background: rgba(255, 255, 255, 0.06);
    }

    .logout-form {
        margin: 0;
    }

    .logout-btn {
        width: 100%;
        border: 0;
        border-radius: 0.9rem;
        background: rgba(239, 68, 68, 0.1);
        color: #fecaca;
        padding: 0.8rem 0.9rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
    }

    .logout-btn:hover {
        background: rgba(239, 68, 68, 0.18);
        color: #fff;
    }

    @media (max-width: 991.98px) {
        .app-sidebar {
            position: sticky;
            top: 0;
            width: 100%;
            height: auto;
            border-right: none;
            border-bottom: 1px solid rgba(148, 163, 184, 0.18);
            box-shadow: none;
            padding-bottom: 0.75rem;
        }

        .app-sidebar + * {
            margin-left: 0;
        }

        .sidebar-nav {
            flex-direction: row;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .nav-item {
            flex: 1 1 auto;
            justify-content: center;
            min-width: 120px;
        }
    }
</style><?php /**PATH C:\laragon\www\APK_POS2\resources\views\layouts\navbar.blade.php ENDPATH**/ ?>