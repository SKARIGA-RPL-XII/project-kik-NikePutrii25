@extends('admin.layout')

@section('page_title', 'Verifikasi Setoran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/verifikasi_setoran.css') }}">
@endpush

@section('content')

    <div class="setoran-page">

        <div class="setoran-card">

            <form method="GET" action="{{ route('admin.verifikasi') }}" class="setoran-header filter-form">

                <div class="setoran-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari peternak...">
                </div>
                <div class="setoran-filter">
                    <input type="date" name="tanggal" value="{{ request('tanggal') }}">
                    <select name="status">
                        <option value="">Status</option>
                        <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    <select name="waktu">
                        <option value="">Waktu</option>
                        <option value="pagi" {{ request('waktu') == 'pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="sore" {{ request('waktu') == 'sore' ? 'selected' : '' }}>Sore</option>
                    </select>
                    <button type="submit" class="btn-primary">
                        Terapkan
                    </button>
                    <a href="{{ route('admin.verifikasi') }}" class="btn-reset">
                        Reset
                    </a>
                </div>
            </form>

            <div class="setoran-table-wrapper">
                <table class="setoran-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Peternak</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah (Liter)</th>
                            <th>Kadar Air</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->peternak->user->nama ?? '-' }}</td>

                                <td>{{ date('d-m-Y', strtotime($item->tgl_setor)) }}</td>

                                <td>{{ ucfirst($item->waktu_setor) }}</td>

                                <td>{{ $item->jumlah_setor }} L</td>

                                <td>
                                    @if($item->kadar_air)
                                        {{ $item->kadar_air }} %
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @if($item->status_setor == 'menunggu')
                                        <span class="badge warning">Menunggu</span>
                                    @elseif($item->status_setor == 'diterima')
                                        <span class="badge success">Diterima</span>
                                    @else
                                        <span class="badge danger">Ditolak</span>
                                    @endif
                                </td>

                                <td class="aksi">
                                    @if($item->status_setor == 'menunggu')

                                        <button type="button" class="icon-btn approve" data-id="{{ $item->id_setoran }}"
                                            onclick="openModalTerima(this)">
                                            <i class="fa-solid fa-check"></i>
                                        </button>

                                        <button class="icon-btn reject" data-id="{{ $item->id_setoran }}"
                                            onclick="openModalTolak(this)">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align:center;">Belum ada setoran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="table-footer">
                    <form method="GET" id="perPageForm" class="per-page-form">
                        <span>Show</span>
                        <select name="per_page" onchange="document.getElementById('perPageForm').submit()">
                            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                            <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                        </select>
                        <span>per page</span>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/verifikasi.js') }}"></script>
@endpush

@include('admin.verifikasi.modal-terima')
@include('admin.verifikasi.modal-tolak')

@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            openSuccessVerif();
        });
    </script>
@endif
<script>
    function changePerPage(value) {

        const url = new URL(window.location.href);

        url.searchParams.set('per_page', value);
        url.searchParams.set('page', 1);

        window.location.href = url.toString();
    }
</script>