<div class="modal" id="modalEdit">
    <div class="modal-box">

        <h3>Edit Data Harga dan Kelompok Susu</h3>
        <div class="modal-divider"></div>

        <form id="formEdit">

            <div class="form-grid">

                <div class="form-group">
                    <label>Kelompok Susu <span>*</span></label>
                    <input type="text" id="editKelompok" value="Grade A">
                </div>

                <div class="form-group">
                    <label>Harga Per Liter <span>*</span></label>
                    <input type="text" id="editHarga" value="6500">
                </div>

                <div class="form-group">
                    <label>Tanggal Berlaku <span>*</span></label>
                    <input type="date" id="editTglMulai">
                </div>
            </div>

            <div class="modal-action">
                <button type="button" class="btn-outline" onclick="openConfirmCancelHargaEdit()">
                    Batal
                </button>
                <button type="button" class="btn-primary" onclick="openConfirmSaveHargaEdit()">
                    Update
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
            <button type="button" class="btn-outline" onclick="backToEditHarga()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="cancelEditHarga()">
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

        <h3>Konfirmasi Perubahan Data</h3>
        <p>
            Anda yakin ingin merubah data harga dan kelompok ini?<br>
            Pastikan seluruh data yang diinput sudah benar.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToEditHarga()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="submitEditHarga()">
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
        <p>Data harga dan kelompok berhasil diubah.</p>

    </div>
</div>