@extends('users.layout')

@section('content')
    <div class="container-wide" style="max-width: 800px;">
        <div class="mb-4">
            <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Profil Saya</h4>
            <p class="text-muted small">Kelola informasi data diri Anda di sini.</p>
        </div>

        <div class="card border-0 shadow-sm p-4" style="border-radius: 16px;">
            <form id="formProfil" action="javascript:void(0);">
                @csrf
                <div class="row g-4">
                    <div class="col-12 d-flex align-items-center gap-3 mb-2">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center fw-bold fs-3"
                            style="width: 80px; height: 80px; border-radius: 20px; background-color: var(--primary-navy) !important;">
                            B
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Bean Peternak</h5>
                            <p class="text-muted small mb-0">Anggota Sejak: Jan 2024</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">NAMA LENGKAP</label>
                        <input type="text" class="form-control bg-light border-0 py-2" id="nama" value="Bean" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">EMAIL (TIDAK DAPAT DIUBAH)</label>
                        <input type="email" class="form-control bg-light border-0 py-2" value="bean@milkyflow.com" disabled>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">NO. HANDPHONE</label>
                        <input type="text" class="form-control bg-light border-0 py-2" id="nohp" value="081234567890"
                            required>
                    </div>

                    <div class="col-12">
                        <label class="form-label small fw-bold text-muted">ALAMAT LENGKAP</label>
                        <textarea class="form-control bg-light border-0 py-2" id="alamat" rows="3"
                            required>Dusun Kanigoro, Kec. Pagelaran, Malang</textarea>
                    </div>

                    <div class="col-12 d-flex gap-2 mt-4">
                        <button type="submit" id="btnSimpanProfil" class="btn-figma shadow-sm w-100"
                            style="background-color: var(--primary-navy) !important;">
                            <i class="bi bi-check-circle me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
@section('js_custom')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/peternak/dashboard.js') }}"></script>