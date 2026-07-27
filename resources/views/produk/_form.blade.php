@csrf

<style>
    :root {
        --purple-main: #8b5cf6;
        --purple-dark: #7c3aed;
        --purple-soft: #f3e8ff;
        --gray-border: #e2e8f0;
    }

    .form-card-section {
        background-color: #ffffff;
        border-radius: 16px;
        border: 1px solid var(--gray-border);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .form-label-custom {
        font-weight: 600;
        color: #374151;
        font-size: 0.875rem;
        margin-bottom: 0.4rem;
        display: inline-block;
    }

    .input-group-custom .input-group-text {
        background-color: #f8fafc;
        border-color: #cbd5e1;
        color: #64748b;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        font-weight: 600;
    }

    .form-control-custom {
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        padding: 0.65rem 0.9rem;
        font-size: 0.9rem;
        transition: all 0.2s ease-in-out;
    }

    .input-group-custom .form-control-custom {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-control-custom:focus {
        border-color: var(--purple-main) !important;
        box-shadow: 0 0 0 3.5px rgba(139, 92, 246, 0.15) !important;
    }

    /* UPLOAD FOTO AREA */
    .file-upload-box {
        border: 2px dashed #cbd5e1;
        border-radius: 14px;
        padding: 1.5rem;
        text-align: center;
        background-color: #f8fafc;
        cursor: pointer;
        transition: all 0.2s ease;
        position: relative;
    }

    .file-upload-box:hover {
        border-color: var(--purple-main);
        background-color: var(--purple-soft);
    }

    .file-upload-box input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* BUTTONS */
    .btn-gradient-submit {
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        border: none;
        color: white;
        padding: 0.7rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(124, 58, 237, 0.25);
        transition: all 0.2s ease;
    }

    .btn-gradient-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(124, 58, 237, 0.35);
        color: white;
    }

    .btn-soft-secondary {
        background: #f1f5f9;
        color: #64748b;
        border: 1px solid #e2e8f0;
        padding: 0.7rem 1.8rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .btn-soft-secondary:hover {
        background: #e2e8f0;
        color: #334155;
    }
</style>

<div class="row g-4">

    {{-- UPLOAD FOTO PRODUK --}}
    <div class="col-12">
        <div class="p-4 form-card-section">
            <label class="form-label-custom">Foto Produk</label>
            
            <div class="file-upload-box mb-2" id="dropArea">
                <input type="file" 
                       name="foto" 
                       id="fotoInput" 
                       onchange="previewImage(this)" 
                       accept="image/*">
                
                <div id="uploadPlaceholder">
                    <i class="bi bi-cloud-arrow-up fs-1 text-purple" style="color: var(--purple-main);"></i>
                    <p class="mb-1 mt-2 fw-semibold text-dark">Klik atau geser foto ke sini untuk mengunggah</p>
                    <span class="text-muted small">Format: JPG, JPEG, PNG (Maks. 2MB)</span>
                </div>

                {{-- PREVIEW FOTO --}}
                <div id="previewContainer" class="mt-2" style="{{ isset($produk) && $produk->foto ? '' : 'display:none;' }}">
                    <div class="position-relative d-inline-block">
                        <img id="preview" 
                             src="{{ isset($produk) && $produk->foto ? asset('storage/' . $produk->foto) : '#' }}" 
                             class="rounded-3 shadow-sm border" 
                             style="width: 120px; height: 120px; object-fit: cover;">
                        
                        <span class="badge bg-purple-soft text-purple position-absolute bottom-0 start-50 translate-middle-x mb-1 px-2 py-1" style="font-size: 0.7rem; background: var(--purple-soft); color: var(--purple-dark);">
                            Preview
                        </span>
                    </div>
                </div>
            </div>

            @error('foto')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>


    {{-- JENIS / KATEGORI PRODUK --}}
    <div class="col-12">
        <div class="p-4 form-card-section">
            <label class="form-label-custom">
                Jenis / Kategori Produk <span class="text-danger">*</span>
            </label>
            <div class="input-group input-group-custom">
                <span class="input-group-text"><i class="bi bi-tags"></i></span>
                <select name="jenis" 
                        class="form-select form-control-custom @error('jenis') is-invalid @enderror" 
                        required>
                    <option value="" disabled {{ old('jenis', $produk->jenis ?? '') == '' ? 'selected' : '' }}>
                        Pilih jenis / kategori produk...
                    </option>
                    <option value="Minuman" {{ old('jenis', $produk->jenis ?? '') == 'Minuman' ? 'selected' : '' }}>
                        Minuman
                    </option>
                    <option value="Makanan" {{ old('jenis', $produk->jenis ?? '') == 'Makanan' ? 'selected' : '' }}>
                        Makanan
                    </option>
                    <option value="Cemilan / Snack" {{ old('jenis', $produk->jenis ?? '') == 'Cemilan / Snack' ? 'selected' : '' }}>
                        Cemilan / Snack
                    </option>
                    <option value="Lainnya" {{ old('jenis', $produk->jenis ?? '') == 'Lainnya' ? 'selected' : '' }}>
                        Lainnya
                    </option>
                </select>
            </div>
            @error('jenis')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>


    {{-- NAMA PRODUK --}}
    <div class="col-12">
        <div class="p-4 form-card-section">
            <label class="form-label-custom">
                Nama Produk <span class="text-danger">*</span>
            </label>
            <div class="input-group input-group-custom">
                <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                <input type="text"
                       name="name"
                       class="form-control form-control-custom @error('name') is-invalid @enderror"
                       placeholder="Contoh: Kopi Susu Gula Aren"
                       value="{{ old('name', $produk->nama ?? '') }}"
                       required>
            </div>
            @error('name')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>


    {{-- HARGA BELI & HARGA JUAL --}}
    <div class="col-md-6">
        <div class="p-4 form-card-section h-100">
            <label class="form-label-custom">
                Harga Beli (Modal) <span class="text-danger">*</span>
            </label>
            <div class="input-group input-group-custom mb-2">
                <span class="input-group-text">Rp</span>
                <input type="number"
                       id="hargaBeli"
                       name="purchase_price"
                       class="form-control form-control-custom @error('purchase_price') is-invalid @enderror"
                       placeholder="0"
                       value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
                       oninput="hitungskalaku()"
                       required>
            </div>
            @error('purchase_price')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="p-4 form-card-section h-100">
            <label class="form-label-custom">
                Harga Jual <span class="text-danger">*</span>
            </label>
            <div class="input-group input-group-custom mb-2">
                <span class="input-group-text">Rp</span>
                <input type="number"
                       id="hargaJual"
                       name="selling_price"
                       class="form-control form-control-custom @error('selling_price') is-invalid @enderror"
                       placeholder="0"
                       value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
                       oninput="hitungskalaku()"
                       required>
            </div>
            
            {{-- ESTIMASI MARGIN KEUNTUNGAN --}}
            <div id="marginInfo" class="small fw-semibold text-muted">
                Estimasi Profit: <span id="marginValue" class="text-success">Rp 0</span>
            </div>

            @error('selling_price')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>


    {{-- STOK --}}
    <div class="col-12">
        <div class="p-4 form-card-section">
            <label class="form-label-custom">
                Stok Awal / Gudang <span class="text-danger">*</span>
            </label>
            <div class="input-group input-group-custom">
                <span class="input-group-text"><i class="bi bi-stack"></i></span>
                <input type="number"
                       name="stock"
                       class="form-control form-control-custom @error('stock') is-invalid @enderror"
                       placeholder="0"
                       value="{{ old('stock', $produk->stok ?? '') }}"
                       required>
                <span class="input-group-text bg-light text-muted">Unit</span>
            </div>
            @error('stock')
                <div class="text-danger small mt-1">
                    <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                </div>
            @enderror
        </div>
    </div>

</div>


{{-- TOMBOL AKSES --}}
<div class="d-flex align-items-center gap-3 mt-4">
    <button type="submit" class="btn btn-gradient-submit d-inline-flex align-items-center gap-2">
        <i class="bi bi-check-circle-fill"></i>
        <span>Simpan Produk</span>
    </button>

    <a href="{{ route('produk.index') }}" class="btn btn-soft-secondary d-inline-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i>
        <span>Batal</span>
    </a>
</div>


{{-- JAVASCRIPT PREVIEW & CALCULATOR MARGIN --}}
<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const container = document.getElementById('previewContainer');
        const placeholder = document.getElementById('uploadPlaceholder');

        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            container.style.display = 'block';
            placeholder.style.display = 'none';
        }
    }

    function hitungskalaku() {
        const beli = parseFloat(document.getElementById('hargaBeli').value) || 0;
        const jual = parseFloat(document.getElementById('hargaJual').value) || 0;
        const profit = jual - beli;
        const marginElem = document.getElementById('marginValue');

        if (jual > 0) {
            if (profit >= 0) {
                marginElem.className = 'text-success fw-bold';
                marginElem.textContent = 'Rp ' + profit.toLocaleString('id-ID') + ' (Untung)';
            } else {
                marginElem.className = 'text-danger fw-bold';
                marginElem.textContent = 'Rp ' + profit.toLocaleString('id-ID') + ' (Rugi)';
            }
        } else {
            marginElem.className = 'text-muted';
            marginElem.textContent = 'Rp 0';
        }
    }

    // Jalankan kalkulasi profit awal jika sedang mode edit data
    document.addEventListener('DOMContentLoaded', hitungskalaku);
</script>