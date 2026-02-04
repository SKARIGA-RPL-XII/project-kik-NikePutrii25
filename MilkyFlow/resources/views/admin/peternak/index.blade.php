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
                <button class="tab active">Data Peternak</button>
                <button class="tab">Akun Peternak</button>
            </div>

            <div class="peternak-action">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                </div>

                <button class="btn-primary" id="btnTambah" onclick="openModal('modalCreate')">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Peternak
                </button>
            </div>

        </div>

        <div class="tab-content active">

            <div class="table-wrapper">
                <table class="peternak-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Budi Santoso</td>
                            <td>Bandung</td>
                            <td>08123456789</td>
                            <td>
                                <span class="badge success">Aktif</span>
                            </td>
                            <td class="aksi">
                                <button class="icon-btn edit" onclick="openModal('modalEdit')">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="icon-btn delete" onclick="openModal('modalDelete')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="tab-content">

            <div class="table-wrapper">
                <table class="peternak-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Terakhir Login</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PTR-001</td>
                            <td>suyanto@gmail.com</td>
                            <td>User</td>
                            <td>2025-01-23 06:45</td>
                            <td>
                                <div class="toggle-wrapper">
                                    <label class="switch">
                                        <input type="checkbox" checked onchange="toggleStatus(this)">
                                        <span class="slider"></span>
                                    </label>

                                    <span class="toggle-text active">Aktif</span>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="reset-link" onclick="openReset('suyanto@email.com')">
                                    Reset Password
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
    <script src="{{ asset('js/peternak.js') }}"></script>
@endpush

@include('admin.peternak.modal-create')
@include('admin.peternak.modal-edit')
@include('admin.peternak.modal-delete')
@include('admin.peternak.modal-resetpw')