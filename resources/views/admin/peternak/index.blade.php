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
                    <input type="text" id="searchInput" placeholder="Search...">
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
                        @forelse ($peternaks as $item)
                            <tr class="peternak-row {{ $item->status_peternak == 0 ? 'row-disabled' : '' }}"
                                data-id="{{ $item->id_peternak }}">
                                <td>{{ $loop->iteration }}</td>
                                <td class="col-nama">{{ $item->user->nama }}</td>
                                <td class="col-alamat">{{ $item->alamat }}</td>
                                <td class="col-hp">{{ $item->no_hp }}</td>
                                <td>
                                    @if ($item->status_peternak == 1)
                                        <span class="badge success">Aktif</span>
                                    @else
                                        <span class="badge">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="aksi">
                                    <button type="button" class="icon-btn edit" data-id="{{ $item->id_peternak }}"
                                        data-nama="{{ $item->user->nama }}" data-email="{{ $item->user->email }}"
                                        data-hp="{{ $item->no_hp }}" data-alamat="{{ $item->alamat }}"
                                        onclick="openEditFromButton(this)">
                                        <i class="fa-solid fa-pen" style="pointer-events:none;"></i>
                                    </button>
                                    <button type="button" class="icon-btn delete" data-id="{{ $item->id_peternak }}"
                                        onclick="openDeleteModal(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align:center;">Data peternak belum ada</td>
                            </tr>
                        @endforelse
                    </tbody>
            </div>
            </table>
            <div class="pagination-wrapper">

                <div class="per-page">
                    <span>Show</span>

                    <select onchange="changePerPage(this.value)">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                    </select>

                    <span>per page</span>
                </div>

                {{ $peternaks->appends(request()->query())->links('components.pagination-figma') }}

            </div>
        </div>

    </div>

    <div class="tab-content">

        <div class="table-wrapper">
            <table class="peternak-table">
                <thead>
                    <tr class="akun-row">
                        <th>No</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Terakhir Login</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</td>
                            <td>User</td>
                            <td> {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->diffForHumans() : '-' }}</td>
                            <td>
                                <button type="button" class="reset-link" data-id="{{ $user->id_user }}"
                                    data-email="{{ $user->email }}" onclick="openResetModal(this)">
                                    Reset Password
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center;">Data akun belum ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination-wrapper">

                <div class="per-page">
                    <span>Show</span>

                    <select onchange="changePerPage(this.value)">
                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                    </select>

                    <span>per page</span>
                </div>

                {{ $users->appends(['tab' => 'akun'])->links('components.pagination-figma') }}

            </div>
        </div>

    </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/peternak.js') }}"></script>
@endpush

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab');

        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');

        if (activeTab === 'akun') {

            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tabs[1].classList.add('active');
            contents[1].classList.add('active');

        } else {

            tabs[0].classList.add('active');
            contents[0].classList.add('active');
        }
    });
</script>

<script>
function changePerPage(value) {

    const url = new URL(window.location.href);

    url.searchParams.set('per_page', value);
    url.searchParams.set('page', 1);

    window.location.href = url.toString();
}
</script>

@include('admin.peternak.modal-create')
@include('admin.peternak.modal-edit')
@include('admin.peternak.modal-delete')
@include('admin.peternak.modal-resetpw')