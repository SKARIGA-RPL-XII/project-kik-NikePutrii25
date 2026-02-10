@extends('users.layout')

@section('content')
    <div class="container-wide">

        <div class="hero-banner mb-5 shadow-sm">
            <div style="max-width: 600px;">
                <h2 class="fw-bold mb-2">
                    Selamat Datang Kembali, {{ auth()->user()->nama }}! 👋🏻
                </h2>
                <p class="mb-0 opacity-75 fw-light">
                    Sistem mencatat kualitas setoran susu Anda.
                </p>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="card-stat shadow-sm">
                    <div class="icon-shape bg-blue-soft">
                        <i class="bi bi-droplet-fill"></i>
                    </div>
                    <p class="text-muted small mb-1 fw-medium text-uppercase">Setoran Hari Ini</p>
                    <h3 class="fw-bold mb-0">
                        {{ number_format($hariIni, 1) }}
                        <small class="fw-normal fs-6 text-muted">Liter</small>
                    </h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-stat shadow-sm">
                    <div class="icon-shape bg-cyan-soft">
                        <i class="bi bi-moisture"></i>
                    </div>
                    <p class="text-muted small mb-1 fw-medium text-uppercase">Rata-rata Kadar Air</p>
                    <h3 class="fw-bold mb-0">
                        {{ number_format($rataKadarAir ?? 0, 2) }}
                        <small class="fw-normal fs-6 text-muted">%</small>
                    </h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-stat shadow-sm">
                    <div class="icon-shape bg-purple-soft">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <p class="text-muted small mb-1 fw-medium text-uppercase">
                        Total Liter ({{ now()->translatedFormat('F') }})
                    </p>
                    <h3 class="fw-bold mb-0">
                        {{ number_format($bulanIni, 1) }}
                        <small class="fw-normal fs-6 text-muted">Liter</small>
                    </h3>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card-stat shadow-sm">
                    <div class="icon-shape bg-green-soft">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <p class="text-muted small mb-1 fw-medium text-uppercase">Estimasi Pendapatan</p>
                    <h3 class="fw-bold mb-0" style="color:#1E3A8A;">
                        Rp {{ number_format($estimasiPendapatan) }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="card-table shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="fw-bold mb-1">Aktivitas Terakhir</h5>
                    <p class="text-muted small mb-0">Daftar penyetoran susu terbaru Anda.</p>
                </div>
                <button type="button" class="btn-figma border-0 shadow-sm" data-bs-toggle="modal"
                    data-bs-target="#modalInputSetoran">
                    <i class="bi bi-plus-lg me-2"></i> Input Setoran Baru
                </button>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Tanggal Setor</th>
                            <th>Waktu</th>
                            <th>Jumlah (L)</th>
                            <th>Kadar Air</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayatSetoran as $item)
                                        <tr>
                                            <td class="fw-semibold">
                                                {{ \Carbon\Carbon::parse($item->tgl_setor)->format('d M Y') }}
                                            </td>
                                            <td>{{ ucfirst($item->waktu_setor) }}</td>
                                            <td class="fw-bold">{{ $item->jumlah_setor }}</td>
                                            <td>{{ $item->kadar_air ? $item->kadar_air . '%' : '-' }}</td>
                                            <td class="text-center">
                                                <span class="badge-figma
                                                    {{ $item->status_setor == 'menunggu' ? 'status-yellow' :
                                                    ($item->status_setor == 'diterima' ? 'status-green' : 'status-red') }}">
                                                    {{ ucfirst(string: $item->status_setor) }}
                                                </span>
                                            </td>
                                        </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada setoran
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js_custom')
    <script src="{{ asset('js/peternak/dashboard.js') }}"></script>
@endsection

<div class="modal fade" id="modalInputSetoran" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 16px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="fw-bold" style="color: var(--primary-navy);">Input Setoran Susu</h5>
            </div>
            <form id="formSetoran" action="{{ route('users.setoran.store') }}" method="POST">
                @csrf
                <div class="modal-body px-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">TANGGAL</label>
                            <input type="date" class="form-control bg-light border-0" name="tgl_setor"
                                value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">WAKTU</label>
                            <select class="form-select bg-light border-0" name="waktu_setor" required>
                                <option value="pagi">Pagi</option>
                                <option value="sore">Sore</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">JUMLAH (LITER)</label>
                            <input type="number" step="0.1" class="form-control bg-light border-0" name="jumlah_setor"
                                placeholder="Contoh: 15.5" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-bold text-muted">KADAR AIR % (OPSIONAL)</label>
                            <input type="number" step="0.01" class="form-control bg-light border-0" name="kadar_air"
                                placeholder="Contoh: 2.5">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4 gap-2">
                    <button type="button" id="btnBatal" class="btn btn-light fw-bold text-muted border-0"
                        style="height: 48px; border-radius: 8px; flex: 1;">
                        Batal
                    </button>
                    <button type="submit" class="btn-figma shadow-sm" style="flex: 2;">
                        Simpan Setoran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>