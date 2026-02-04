<div class="modal-overlay" id="modalOverlay"></div>

<div class="modal" id="modalTambah">
    <div class="modal-box">
        <h3>Tambah Harga</h3>
        <div class="modal-divider"></div>
        <form id="formCreate">
            <div class="form-grid">

                <div class="form-group">
                    <label>Kelompok Susu <span>*</span></label>
                    <input type="text" placeholder="Masukkan nama kelompok susu">
                </div>

                <div class="form-group">
                    <label>Harga Per Liter <span>*</span></label>
                    <input type="text" placeholder="Rp Masukkan Harga">
                </div>

                <div class="form-group">
                    <label>Tanggal Berlaku <span>*</span></label>
                    <input type="date" placeholder="DD/MM/YYYY">
                </div>
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

<div class="modal" id="modalConfirm">
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
            <button type="button" class="btn-primary" onclick="submitHarga()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="modal" id="modalSuccess">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Data harga dan kelompok berhasil disimpan.</p>

    </div>
</div>