@extends('admin.layout')

@section('page_title', 'Laporan Pembayaran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/laporan.css') }}">
@endpush

@section('content')
    <div class="laporan-page">
        <div class="laporan-card">

            <div class="laporan-header">
                <div class="laporan-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                </div>

                <div class="laporan-filter">
                    <div class="filter-dropdown">
                        <button type="button" class="filter-btn" onclick="toggleFilter('bulanMenu')">
                            Pilih Bulan <i class="fa-solid fa-chevron-down"></i>
                        </button>

                        <ul class="filter-menu" id="bulanMenu">
                            <li onclick="selectFilter(this, 'bulan')">Januari</li>
                            <li onclick="selectFilter(this, 'bulan')">Februari</li>
                            <li onclick="selectFilter(this, 'bulan')">Maret</li>
                            <li onclick="selectFilter(this, 'bulan')">April</li>
                            <li onclick="selectFilter(this, 'bulan')">Mei</li>
                            <li onclick="selectFilter(this, 'bulan')">Juni</li>
                            <li onclick="selectFilter(this, 'bulan')">Juli</li>
                            <li onclick="selectFilter(this, 'bulan')">Agustus</li>
                            <li onclick="selectFilter(this, 'bulan')">September</li>
                            <li onclick="selectFilter(this, 'bulan')">Oktober</li>
                            <li onclick="selectFilter(this, 'bulan')">November</li>
                            <li onclick="selectFilter(this, 'bulan')">Desember</li>
                        </ul>
                    </div>
                    <div class="filter-dropdown">
                        <button type="button" class="filter-btn" onclick="toggleFilter('tahunMenu')">
                            Pilih Tahun <i class="fa-solid fa-chevron-down"></i>
                        </button>

                        <ul class="filter-menu" id="tahunMenu">
                            <li onclick="selectFilter(this, 'tahun')">2022</li>
                            <li onclick="selectFilter(this, 'tahun')">2023</li>
                            <li onclick="selectFilter(this, 'tahun')">2024</li>
                            <li onclick="selectFilter(this, 'tahun')">2025</li>
                            <li onclick="selectFilter(this, 'tahun')">2026</li>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="laporan-table-wrapper">
                <table class="laporan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peternak</th>
                            <th>Total (L)</th>
                            <th>Harga/L</th>
                            <th>Total Nilai</th>
                            <th>Potongan</th>
                            <th>Total Bersih</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Suyanto</td>
                            <td>3.450</td>
                            <td>Rp 6.500</td>
                            <td>Rp 22.425.000</td>
                            <td>Rp 500.000</td>
                            <td><strong>Rp 21.925.000</strong></td>
                            <td>
                                <button class="icon-btn detail" onclick="openPreview()">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/laporan.js') }}"></script>
@endpush

@include('admin.laporan.modal-preview')