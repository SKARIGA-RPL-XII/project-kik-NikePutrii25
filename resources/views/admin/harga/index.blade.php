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
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kelompok->nama_kelompok }}</td>
                                <td>Rp {{ number_format($item->harga_per_liter, 0, ',', '.') }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tanggal_berlaku)) }}</td>
                                <td>{{ $item->kelompok->keterangan ?? '-' }}</td>
                                <td class="aksi">

                                    <button class="icon-btn edit" onclick='openEditHarga(
                                        "{{ $item->id_harga }}",
                                        "{{ $item->kelompok->nama_kelompok }}",
                                        "{{ $item->harga_per_liter }}",
                                        "{{ $item->tanggal_berlaku }}",
                                        "{{ optional($item->kelompok)->keterangan }}"
                                    )'>
                                        <i class="fa-solid fa-pen"></i>
                                    </button>

                                    <button class="icon-btn delete" onclick="openDeleteHarga('{{ $item->id_harga }}')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center;">Data belum ada</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/harga.js') }}"></script>
@endpush

@include('admin.harga.modal-edit')
@include('admin.harga.modal-create')
@include('admin.harga.modal-delete')
<form id="formDelete" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>