@extends('users.layout')

@section('content')
    <div class="container-wide">

        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h4 class="fw-bold mb-1" style="color: var(--primary-navy);">Riwayat Setoran</h4>
                <p class="text-muted small mb-0">Manajemen data setoran susu Anda secara transparan.</p>
            </div>

            <form method="GET" class="d-flex gap-2">
                <input type="month" name="bulan" value="{{ $bulan }}" class="form-control border-0 shadow-sm"
                    style="border-radius:8px;font-size:0.85rem;">
                <button class="btn btn-white border shadow-sm fw-bold"
                    style="border-radius:8px;font-size:0.85rem;color:var(--primary-navy);">
                    <i class="bi bi-filter me-1"></i> Filter
                </button>
            </form>
        </div>

        <div class="card-table shadow-sm border-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-3">ID SETORAN</th>
                            <th>TANGGAL</th>
                            <th>WAKTU</th>
                            <th>JUMLAH</th>
                            <th>KADAR AIR</th>
                            <th class="text-center">STATUS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($riwayatSetoran as $item)
                                        <tr>
                                            <td class="ps-3 text-muted fw-medium">
                                                #STR-{{ str_pad($item->id_setoran, 4, '0', STR_PAD_LEFT) }}
                                            </td>

                                            <td class="fw-semibold">
                                                {{ \Carbon\Carbon::parse($item->tgl_setor)->format('d M Y') }}
                                            </td>

                                            <td>
                                                <span class="badge bg-light text-dark border-0">
                                                    {{ ucfirst($item->waktu_setor) }}
                                                </span>
                                            </td>

                                            <td class="fw-bold {{ $item->status_setor == 'ditolak' ? 'text-danger' : '' }}">
                                                {{ number_format($item->jumlah_setor, 1) }} L
                                            </td>

                                            <td class="{{ $item->kadar_air > 3 ? 'text-danger' : '' }}">
                                                {{ $item->kadar_air ? $item->kadar_air . '%' : '-' }}
                                            </td>

                                            <td class="text-center">
                                                <span class="badge-figma
                                                    {{ $item->status_setor == 'menunggu' ? 'status-yellow' :($item->status_setor == 'diterima' ? 'status-green' : 'status-red') }}">
                                                    {{ ucfirst($item->status_setor) }}
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">

                                                    <button class="btn btn-sm btn-light border-0" data-bs-toggle="modal"
                                                        data-bs-target="#modalDetail{{ $item->id_setoran }}">
                                                        <i class="bi bi-eye text-primary"></i>
                                                    </button>

                                                    @if($item->status_setor == 'menunggu')
                                                        <button class="btn btn-sm btn-light border-0" data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ $item->id_setoran }}">
                                                            <i class="bi bi-pencil-square text-warning"></i>
                                                        </button>
                                                    @endif

                                                    @if($item->status_setor == 'ditolak')
                                                        <button class="btn btn-sm btn-light border-0" data-bs-toggle="modal"
                                                            data-bs-target="#modalAlasan{{ $item->id_setoran }}">
                                                            <i class="bi bi-exclamation-triangle text-danger"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalDetail{{ $item->id_setoran }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow" style="border-radius:16px;">
                                                    <div class="modal-header border-0 pt-4 px-4">
                                                        <h5 class="fw-bold" style="color:var(--primary-navy);">
                                                            Ringkasan Setoran
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body px-4 pb-4">
                                                        <div class="d-flex flex-column gap-3">
                                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                                <span class="text-muted small">ID Setoran</span>
                                                                <span class="fw-bold small">
                                                                    #STR-{{ str_pad($item->id_setoran, 4, '0', STR_PAD_LEFT) }}
                                                                </span>
                                                            </div>
                                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                                <span class="text-muted small">Tanggal</span>
                                                                <span class="fw-bold small">
                                                                    {{ \Carbon\Carbon::parse($item->tgl_setor)->format('d M Y') }}
                                                                </span>
                                                            </div>
                                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                                <span class="text-muted small">Waktu</span>
                                                                <span class="fw-bold small">{{ ucfirst($item->waktu_setor) }}</span>
                                                            </div>
                                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                                <span class="text-muted small">Jumlah</span>
                                                                <span class="fw-bold small">
                                                                    {{ number_format($item->jumlah_setor, 1) }} Liter
                                                                </span>
                                                            </div>
                                                            <div class="d-flex justify-content-between border-bottom pb-2">
                                                                <span class="text-muted small">Kadar Air</span>
                                                                <span class="fw-bold small">
                                                                    {{ $item->kadar_air ? $item->kadar_air . '%' : '-' }}
                                                                </span>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="text-muted small">Status</span>
                                                                <span
                                                                    class="badge-figma
                                                                    {{ $item->status_setor == 'menunggu' ? 'status-yellow' :($item->status_setor == 'diterima' ? 'status-green' : 'status-red') }}">
                                                                    {{ ucfirst($item->status_setor) }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($item->status_setor == 'ditolak')
                                            <div class="modal fade" id="modalAlasan{{ $item->id_setoran }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow" style="border-radius:16px;">
                                                        <div class="modal-header bg-danger-subtle border-0 px-4 pt-4">
                                                            <h5 class="fw-bold text-danger mb-0">Setoran Ditolak</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body text-center p-4">
                                                            <i class="bi bi-x-circle text-danger mb-3" style="font-size:3rem;"></i>
                                                            <h6 class="fw-bold">Alasan Penolakan</h6>
                                                            <p class="text-muted small">
                                                                Kadar air melebihi standar kualitas.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if($item->status_setor == 'menunggu')
                                            <div class="modal fade" id="modalEdit{{ $item->id_setoran }}" tabindex="-1" >
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content border-0 shadow" style="border-radius:16px;">
                                                        <div class="modal-header border-0 pt-4 px-4">
                                                            <div>
                                                                <h5 class="fw-bold mb-0" style="color:var(--primary-navy);">Edit Setoran</h5>
                                                                <small class="text-muted">
                                                                    ID Setoran: #STR-{{ str_pad($item->id_setoran, 4, '0', STR_PAD_LEFT) }}
                                                                </small>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <form method="POST" action="{{ route('users.setoran.update', $item->id_setoran) }}" class="formEditSetoran">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-body px-4">
                                                                <div class="alert alert-warning border-0 small">
                                                                    <i class="bi bi-info-circle me-2"></i>
                                                                    Data hanya bisa diubah sebelum diverifikasi admin.
                                                                </div>

                                                                <div class="row g-3">
                                                                    <div class="col-12">
                                                                        <label class="form-label small fw-bold text-muted">Tanggal</label>
                                                                        <input type="date" class="form-control bg-light border-0"
                                                                            name="tgl_setor" value="{{ $item->tgl_setor }}" required>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label class="form-label small fw-bold text-muted">Waktu</label>
                                                                        <select class="form-select bg-light border-0" name="waktu_setor">
                                                                            <option value="pagi" {{ $item->waktu_setor == 'pagi' ? 'selected' : '' }}>
                                                                                Pagi</option>
                                                                            <option value="sore" {{ $item->waktu_setor == 'sore' ? 'selected' : '' }}>
                                                                                Sore</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label class="form-label small fw-bold text-muted">Jumlah
                                                                            (Liter)</label>
                                                                        <input type="number" step="0.1" class="form-control bg-light border-0"
                                                                            name="jumlah_setor" value="{{ $item->jumlah_setor }}" required>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label class="form-label small fw-bold text-muted">Kadar Air (%)</label>
                                                                        <input type="number" step="0.01" class="form-control bg-light border-0"
                                                                            name="kadar_air" value="{{ $item->kadar_air }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer border-0 pb-4 px-4 gap-2">
                                                                <button type="button" class="btn btn-light border-0 fw-bold"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn-figma shadow-sm"
                                                                    style="background-color:#D97706!important;">
                                                                    Update Data
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Tidak ada data setoran
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