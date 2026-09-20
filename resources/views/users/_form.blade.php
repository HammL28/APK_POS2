@csrf

<div class="row g-4">
    <div class="col-12 col-md-6">
        <div class="form-floating">
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" placeholder="Nama lengkap" autocomplete="name">
            <label for="name">Nama Lengkap</label>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" placeholder="Email" autocomplete="email">
            <label for="email">Email</label>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="form-floating">
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autocomplete="new-password">
            <label for="password">Password {{ isset($user) ? '(Kosongkan jika tidak ingin diubah)' : '' }}</label>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="form-floating">
            <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror" aria-label="Pilih role">
                <option value="">-- Pilih Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                        {{ ucfirst($role->name) }}
                    </option>
                @endforeach
            </select>
            <label for="role_id">Role</label>
            @error('role_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4 pt-3 border-top border-light-subtle">
    <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
    <button type="submit" class="btn btn-primary rounded-pill px-4 fw-semibold">
        <i class="bi bi-check-circle me-1"></i> Simpan
    </button>
</div>
