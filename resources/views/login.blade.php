@extends('layouts.app')

@section('title', 'Login - POS System')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #e879f9 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .login-card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        background: #ffffff;
        overflow: hidden;
        width: 100%;
        max-width: 420px;
    }

    .login-header {
        background: transparent;
        padding: 2.5rem 2rem 1rem 2rem;
        border-bottom: none;
    }

    .login-icon-wrapper {
        width: 65px;
        height: 65px;
        background: #f3e8ff;
        color: #7c3aed;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem auto;
    }

    .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        border: 1.5px solid #e2e8f0;
        font-size: 0.95rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #a855f7;
        box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.15);
    }

    .btn-gradient-login {
        background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
        border: none;
        color: white;
        padding: 0.8rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.25s ease;
    }

    .btn-gradient-login:hover {
        background: linear-gradient(135deg, #6d28d9 0%, #9333ea 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(124, 58, 237, 0.35);
        color: white;
    }

    .error-badge {
        font-size: 0.8rem;
        border-radius: 8px;
        padding: 0.35rem 0.6rem;
        margin-top: 0.4rem;
        display: inline-block;
    }
</style>

<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="card login-card">
        
        {{-- HEADER CARD --}}
        <div class="login-header text-center">
            <div class="login-icon-wrapper shadow-sm">
                <i class="bi bi-shop fs-2"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Masuk POS </h4>
            <p class="text-muted small">Silakan login untuk mengelola transaksi</p>
        </div>

        {{-- BODY CARD / FORM LOGIN --}}
        <div class="card-body px-4 pb-4">
            
            {{-- ALERT SUCCESS / ERROR DARI SESSION (OPSIONAL) --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 small mb-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('auth') }}" method="POST">
                @csrf

                {{-- EMAIL INPUT --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-secondary small">Alamat Email</label>
                    <div class="input-group">
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               placeholder="nama@email.com" 
                               required 
                               autofocus>
                    </div>
                    @error('email')
                        <div class="badge bg-danger-subtle text-danger border border-danger-subtle error-badge">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD INPUT --}}
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold text-secondary small">Kata Sandi</label>
                    <input type="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           placeholder="••••••••" 
                           required>
                    @error('password')
                        <div class="badge bg-danger-subtle text-danger border border-danger-subtle error-badge">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- SUBMIT BUTTON --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-gradient-login d-flex align-items-center justify-content-center gap-2">
                        <span>Masuk</span>
                        <i class="bi bi-box-arrow-in-right fs-5"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection