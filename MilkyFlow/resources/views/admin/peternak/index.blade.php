@extends('admin.layout')

@section('page_id', 'peternak')
@section('page_title', 'Data dan Akun Peternak')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/peternak.css') }}">
@endpush

@section('content')

<div class="peternak-card">

    <div class="peternak-header">

        <div class="peternak-tabs">
            <button class="tab active" data-tab="data">Data Peternak</button>
            <button class="tab" data-tab="akun">Akun Peternak</button>
        </div>

        <div class="peternak-action">
            <form method="GET">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text"
                        name="{{ request('search_akun') ? 'search_akun' : 'search_peternak' }}"
                        value="{{ request('search_peternak') ?? request('search_akun') }}"
                        placeholder="Search...">
                </div>
            </form>

            <button class="btn-primary" onclick="openModal('modalCreate')">
                <i class="fa-solid fa-plus"></i> Tambah Peternak
            </button>
        </div>

    </div>

    <div class="tab-content active" id="tab-data">
        <div class="table-wrapper">
            <table class="peternak-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Kelompok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peternak as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ optional($p->user)->nama ?? '-' }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ optional($p->kelompok)->nama_kelompok ?? '-' }}</td>
                        <td>
                            <span class="badge {{ $p->status_peternak ? 'success' : 'danger' }}">
                                {{ $p->status_peternak ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="aksi">
                            <button class="icon-btn edit"
                                onclick="editPeternak('{{ $p->id }}')">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="icon-btn delete"
                                onclick="hapusPeternak('{{ $p->id }}')">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Data kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="tab-content" id="tab-akun">
        <div class="table-wrapper">
            <table class="peternak-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($akun as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ ucfirst($u->role) }}</td>
                        <td>
                            <div class="toggle-wrapper">
                                <label class="switch">
                                    <input type="checkbox"
                                        {{ $u->status_akun === 'aktif' ? 'checked' : '' }}
                                        onchange="toggleStatus('{{ $u->id }}')">
                                    <span class="slider"></span>
                                </label>
                                <span class="toggle-text {{ $u->status_akun === 'aktif' ? 'active' : '' }}">
                                    {{ ucfirst($u->status_akun) }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <button class="reset-link"
                                onclick="openReset('{{ $u->email }}')">
                                Reset Password
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Data akun kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/peternak.js') }}"></script>
@endpush

@include('admin.peternak.modal-create')
@include('admin.peternak.modal-edit')
@include('admin.peternak.modal-delete')
@include('admin.peternak.modal-resetpw')
