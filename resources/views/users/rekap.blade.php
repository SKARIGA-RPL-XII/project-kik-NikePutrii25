@extends('users.layout')

@section('content')
    <div class="container-wide">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Rekap Pendapatan</h4>
                <p class="text-muted small">Periode: <span class="fw-bold text-dark">Februari 2026</span></p>
            </div>
            <a href="{{ url('peternak/cetak-rekap') }}" target="_blank" class="btn-figma text-decoration-none">
                <i class="bi bi-printer me-2"></i> Cetak Laporan
            </a>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card-stat shadow-sm border-0 h-100" style="background: var(--primary-navy); color: white;">
                    <p class="opacity-75 small mb-1 fw-medium text-uppercase">Estimasi Pendapatan</p>
                    <h2 class="fw-bold mb-3">Rp 2.403.750</h2>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success-subtle text-success border-0" style="font-size: 0.75rem;">
                            <i class="bi bi-graph-up-arrow me-1"></i> +12% dari bulan lalu
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-stat shadow-sm border-0 h-100">
                    <p class="text-muted small mb-1 fw-medium text-uppercase">Total Liter Terverifikasi</p>
                    <h2 class="fw-bold mb-2">320.5 <small class="fs-6 fw-normal text-muted">Liter</small></h2>
                    <p class="text-muted small mb-0"><i class="bi bi-info-circle me-1"></i> Hanya setoran berstatus
                        <b>Diterima</b>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-stat shadow-sm border-0 h-100">
                    <p class="text-muted small mb-1 fw-medium text-uppercase">Kualitas Rata-rata</p>
                    <h2 class="fw-bold mb-2">2.1 <small class="fs-6 fw-normal text-muted">% Kadar Air</small></h2>
                    <span class="badge bg-info-subtle text-info fw-bold" style="font-size: 0.75rem;">Grade A
                        (Premium)</span>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white p-4 rounded-4 shadow-sm border h-100">
                    <h6 class="fw-bold mb-4">Grafik Produksi Susu (7 Hari Terakhir)</h6>
                    <div style="height: 300px;">
                        <canvas id="chartSetoran"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-white p-4 rounded-4 shadow-sm border h-100">
                    <h6 class="fw-bold mb-4">Rincian Harga & Pendapatan</h6>
                    <div class="d-flex flex-column gap-3">
                        <div class="p-3 bg-light rounded-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Harga Dasar</span>
                                <span class="fw-bold small">Rp 7.000/L</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Bonus Kualitas</span>
                                <span class="text-success fw-bold small">+ Rp 500/L</span>
                            </div>

                            <hr class="my-2">

                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Total Bruto</span>
                                <span class="fw-bold small text-dark">Rp 2.403.750</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex flex-column">
                                    <span class="text-muted small">Potongan</span>
                                    <small class="text-muted" style="font-size: 0.65rem;">(Cicilan Pakan)</small>
                                </div>
                                <span class="text-danger fw-bold small">- Rp 500.000</span>
                            </div>

                            <hr class="my-2">

                            <div class="d-flex justify-content-between">
                                <span class="fw-bold">Total Bersih</span>
                                <span class="fw-bold text-primary">Rp 1.903.750</span>
                            </div>
                        </div>

                        <div class="alert alert-info border-0 small mb-0">
                            <i class="bi bi-lightning-charge-fill me-1"></i>
                            Tips: Pertahankan kadar air di bawah 2.2% untuk tetap mendapatkan bonus kualitas!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_custom')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/peternak/rekap.js') }}"></script>
@endsection