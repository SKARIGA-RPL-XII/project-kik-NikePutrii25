<div class="modal" id="modalEdit">
    <div class="modal-box">

        <h3>Edit Data Peternak</h3>
        <div class="modal-divider"></div>

        <form id="formEdit" onsubmit="return false;">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Peternak </label>
                    <input type="text" name="nama" id="editNama">
                </div>

                <div class="form-group">
                    <label>Email </label>
                    <input type="email" name="email" id="editEmail">
                </div>

                <div class="form-group full">
                    <label>No HP </label>
                    <input type="text" name="no_hp" id="editHp" placeholder="08xxxxxxxxxx" maxlength="12"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')" />
                </div>

                <div class="form-group full">
                    <label>Alamat </label>
                    <textarea name="alamat" id="editAlamat"></textarea>
                </div>

            </div>

            <div class="modal-action">
                <button type="button" class="btn-outline" onclick="openConfirmCancel()">
                    Batal
                </button>
                <button type="button" class="btn-primary" onclick="openConfirmSaveEdit()">
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
            <button type="button" class="btn-outline" onclick="cancelConfirm()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="cancelAndBackToList()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>
<div class="modal" id="modalConfirmUpdate">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Perubahan Data</h3>
        <p>
            Anda yakin ingin merubah data peternak ini?<br>
            Pastikan seluruh data yang diinput sudah benar.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="cancelConfirm()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="handleConfirm()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="modal" id="modalSuccessUpdate">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Data peternak berhasil diubah.</p>

    </div>
</div>