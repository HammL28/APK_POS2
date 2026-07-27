@extends('layouts.app')

@section('title', 'Tambah User - POS ILHAM')

@section('content')

@include('layouts.navbar')

<style>
    .banner-purple-gradient {
        background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #e879f9 100%) !important;
        color: #ffffff !important;
    }
</style>

<div class="container py-4">

    {{-- HEADER BANNER --}}
    <div class="banner-purple-gradient p-4 rounded-4 mb-4 shadow-sm">
        <h2 class="fw-bold mb-1 text-white d-flex align-items-center gap-2">
            <i class="bi bi-person-plus-fill fs-2"></i> Tambah User Baru
        </h2>
        <p class="text-white opacity-75 small mb-0">Isi data akun baru untuk memberikan hak akses ke dalam sistem POS.</p>
    </div>

    {{-- FORM CARD --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @include('users._form')
            </form>
        </div>
    </div>

</div>

@endsection