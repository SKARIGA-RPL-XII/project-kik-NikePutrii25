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

                                    <button class="icon-btn detail" onclick="openDetailSetoran('{{ $item->id_setoran }}')">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    @if($item->status_setor == 'menunggu')
                                        <button class="icon-btn approve" onclick="openVerifikasi('{{ $item->id_setoran }}')">
                                            <i class="fa-solid fa-check"></i>
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
            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/verifikasi.js') }}"></script>
@endpush

@include('admin.verifikasi.modal-detail')
@include('admin.verifikasi.modal-verifikasi')