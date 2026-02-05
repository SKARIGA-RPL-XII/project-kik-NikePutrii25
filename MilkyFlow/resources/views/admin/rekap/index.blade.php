@extends('admin.layout')

@section('page_title', 'Rekap Setoran')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rekap.css') }}">
@endpush

@section('content')
    <div class="rekap-page">

        <div class="rekap-card">

            <div class="rekap-header">
                <div class="rekap-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                </div>

                <div class="rekap-filter">

                    <div class="filter-dropdown">
                        <button class="filter-btn" data-target="filterWaktu">
                            <span id="labelWaktu">Pagi</span>
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>

                        <ul class="filter-menu" id="filterWaktu">
                            <li data-value="Pagi">Pagi</li>
                            <li data-value="Sore">Sore</li>
                        </ul>
                    </div>

                        <div class="filter-dropdown">
                            <button class="filter-btn" data-target="filterBulan">
                                <span id="labelBulan">Pilih Bulan</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>

                            <ul class="filter-menu" id="filterBulan">
                                <li>Januari</li>
                                <li>Februari</li>
                                <li>Maret</li>
                                <li>April</li>
                                <li>Mei</li>
                                <li>Juni</li>
                                <li>Juli</li>
                                <li>Agustus</li>
                                <li>September</li>
                                <li>Oktober</li>
                                <li>November</li>
                                <li>Desember</li>
                            </ul>
                        </div>

                        <div class="filter-dropdown">
                            <button class="filter-btn" data-target="filterTahun">
                                <span id="labelTahun">Pilih Tahun</span>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>

                            <ul class="filter-menu" id="filterTahun">
                                <li>2022</li>
                                <li>2023</li>
                                <li>2024</li>
                                <li>2025</li>
                                <li>2026</li>
                            </ul>
                        </div>

                </div>

            </div>

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
                        <tr>
                            <td>1</td>
                            <td><strong>Suyanto</strong></td>
                            <td>Pagi</td>
                            <td>3.450</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><strong>Suyanto</strong></td>
                            <td>Pagi</td>
                            <td>3.450</td>
                            <td>28</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><strong>Suyanto</strong></td>
                            <td>Pagi</td>
                            <td>3.450</td>
                            <td>28</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/rekap.js') }}"></script>
@endpush