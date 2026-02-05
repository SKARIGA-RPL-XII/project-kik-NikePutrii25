@extends('admin.layout')

@section('page_title', 'Verifikasi Setoran')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/verifikasi_setoran.css') }}">
@endpush

@section('content')

<div class="setoran-page">

    <div class="setoran-card">

        <div class="setoran-header">
            <div class="setoran-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari peternak...">
            </div>
            <div class="setoran-filter">
            <input type="date">
            <select>
                <option>Status</option>
                <option>Menunggu</option>
                <option>Diterima</option>
                <option>Ditolak</option>
            </select>
            <select>
                <option>Pagi</option>
                <option>Sore</option>
            </select>
        </div>
        </div>

        <div class="setoran-table-wrapper">
            <table class="setoran-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Peternak</th>
                        <th>Tanggal</th>
                        <th>Jumlah (Liter)</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Suyanto</td>
                        <td>2025-01-25</td>
                        <td>25 L</td>
                        <td>Rp 150.000</td>
                        <td>
                            <span class="badge warning">Menunggu</span>
                        </td>
                        <td class="aksi">
                            <button class="icon-btn detail" onclick="openModal('modalDetailSetoran')">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="icon-btn approve" onclick="openVerifikasi()">
                                <i class="fa-solid fa-check"></i>
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
<script src="{{ asset('js/verifikasi.js') }}"></script>
@endpush

@include('admin.verifikasi.modal-detail')
@include('admin.verifikasi.modal-verifikasi')