@extends('admin.layout')

@section('page_id', 'harga')

@section('page_title', 'Harga dan Kelompok Susu')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/harga.css') }}">
@endpush

@section('content')

<div class="harga-page">

    <div class="harga-card">

        <div class="harga-header">
            <div class="harga-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search...">
            </div>

           <button class="btn-primary" onclick="openTambahHarga()">
                <i class="fa-solid fa-plus"></i>
                Tambah Harga Susu
            </button>
        </div>

        <div class="harga-table-wrapper">
            <table class="harga-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelompok Susu</th>
                        <th>Harga Per Liter (Rp)</th>
                        <th>Tanggal Berlaku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Grade A</td>
                        <td>6.500</td>
                        <td>01-01-2025</td>
                        <td class="aksi">
                            <button class="icon-btn edit" onclick="openEditHarga()">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="icon-btn delete" onclick="openDeleteHarga()">
                                <i class="fa-solid fa-trash"></i>
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
<script src="{{ asset('js/harga.js') }}"></script>
@endpush

@include('admin.harga.modal-create')
@include('admin.harga.modal-edit')
@include('admin.harga.modal-delete')
