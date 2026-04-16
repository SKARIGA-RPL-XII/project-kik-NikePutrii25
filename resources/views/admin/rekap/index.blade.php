@extends('admin.layout')

@section('page_title', 'Rekap Setoran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rekap.css') }}">
@endpush

@section('content')
    <div class="rekap-page">

        <div class="rekap-card">

            <form method="GET" action="{{ route('admin.rekap') }}">

                <div class="rekap-header">

                    <div class="rekap-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
                    </div>

                    <div class="rekap-filter">

                        <input type="hidden" name="waktu" id="inputWaktu" value="{{ request('waktu') }}">
                        <input type="hidden" name="bulan" id="inputBulan" value="{{ request('bulan') ?? now()->month }}">
                        <input type="hidden" name="tahun" id="inputTahun" value="{{ request('tahun') ?? now()->year }}">

                        <div class="filter-dropdown">
                            <button type="button" class="filter-btn" data-target="filterWaktu">
                                <span id="labelWaktu">
                                    {{ request('waktu') ? ucfirst(request('waktu')) : 'Semua Waktu' }}
                                </span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>

                            <ul class="filter-menu" id="filterWaktu">
                                <li data-value="">Semua</li>
                                <li data-value="pagi">Pagi</li>
                                <li data-value="sore">Sore</li>
                            </ul>
                        </div>

                        <div class="filter-dropdown">
                            <button type="button" class="filter-btn" data-target="filterBulan">
                                <span id="labelBulan">
                                    {{ \Carbon\Carbon::create()->month(request('bulan') ?? now()->month)->format('F') }}
                                </span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>

                            <ul class="filter-menu" id="filterBulan">
                                <li data-value="1">Januari</li>
                                <li data-value="2">Februari</li>
                                <li data-value="3">Maret</li>
                                <li data-value="4">April</li>
                                <li data-value="5">Mei</li>
                                <li data-value="6">Juni</li>
                                <li data-value="7">Juli</li>
                                <li data-value="8">Agustus</li>
                                <li data-value="9">September</li>
                                <li data-value="10">Oktober</li>
                                <li data-value="11">November</li>
                                <li data-value="12">Desember</li>
                            </ul>
                        </div>

                        <div class="filter-dropdown">
                            <button type="button" class="filter-btn" data-target="filterTahun">
                                <span id="labelTahun">
                                    {{ request('tahun') ?? now()->year }}
                                </span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>

                            <ul class="filter-menu" id="filterTahun">
                                @for($i = now()->year; $i >= 2022; $i--)
                                    <li data-value="{{ $i }}">{{ $i }}</li>
                                @endfor
                            </ul>
                        </div>

                        <button type="submit" class="btn-primary">
                            Terapkan
                        </button>

                        <a href="{{ route('admin.rekap') }}" class="btn-reset">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <div class="rekap-table-wrapper">
                <table class="rekap-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peternak</th>
                            <th>Waktu Setoran</th>
                            <th>Total Setoran (L)</th>
                            <th>Jumlah Setoran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <strong>
                                        {{ $item->peternak->user->nama ?? '-' }}
                                    </strong>
                                </td>
                                <td>
                                    <div class="rekap-waktu">
                                        <span class="badge-waktu">
                                            {{ ucfirst($item->waktu_setor) }}
                                        </span>

                                        <span class="rekap-tanggal">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    {{ number_format($item->total_liter, 2) }} L
                                </td>
                                <td>
                                    {{ $item->jumlah_setoran }} kali
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">
                                    Tidak ada data rekap
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/rekap.js') }}"></script>
@endpush