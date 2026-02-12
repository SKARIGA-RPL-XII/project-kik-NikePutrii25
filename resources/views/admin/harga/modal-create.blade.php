<div class="modal-overlay" id="modalOverlay"></div>

<div class="modal" id="modalTambah">
    <div class="modal-box">
        <h3>Tambah Harga</h3>
        <div class="modal-divider"></div>
        <form id="formCreate" action="{{ route('admin.harga.store') }}" method="POST">
            @csrf
            <div class="form-grid">

                <div class="form-group">
                    <label>Kelompok Susu <span>*</span></label>
                    <input type="text" name="kelompok_susu" placeholder="Masukkan nama kelompok susu" required>
                </div>

                <div class="form-group">
                    <label>Harga Per Liter <span>*</span></label>
                    <input type="text" name="harga_per_liter" placeholder="Rp Masukkan Harga" required>
                </div>
            </div>

            <div class="form-group full">
                    <label>Tanggal Berlaku <span>*</span></label>
                    <input type="date" name="tanggal_berlaku" placeholder="DD/MM/YYYY" required>
            </div>

            <div class="form-group full">
                    <label>Keterangan</label>
                    <textarea type="text" name="keterangan">Masukkan Keterangan</textarea>
            </div>

            <div class="modal-action">
                <button type="button" class="btn-outline" onclick="openConfirmCancelHarga()">
                    Batal
                </button>
                <button type="button" class="btn-primary" onclick="openConfirmSaveHarga()">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modalCancel">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Batalkan Perubahan?</h3>
        <p>
            Data yang telah Anda isi belum disimpan.<br>
            Anda yakin ingin membatalkan dan keluar dari form ini?
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToTambahHarga()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="cancelHarga()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="modal" id="modalConfirmTambah">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Simpan Data</h3>
        <p>
            Anda yakin ingin menyimpan data harga dan kelompok ini?<br>
            Pastikan seluruh data yang diinput sudah benar.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToTambahHarga()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="submitTambahHarga()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="modal" id="modalSuccessTambah">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Data harga dan kelompok berhasil disimpan.</p>

    </div>
</div>