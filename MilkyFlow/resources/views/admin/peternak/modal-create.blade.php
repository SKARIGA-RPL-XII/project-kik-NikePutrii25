<div class="modal-overlay" id="modalOverlay"></div>

<div class="modal" id="modalCreate">
    <div class="modal-box">

        <h3>Tambah Data Peternak</h3>
        <div class="modal-divider"></div>

        <form id="formCreate">

            <div class="form-grid">

                <div class="form-group">
                    <label>Nama Peternak <span>*</span></label>
                    <input type="text" placeholder="Masukkan nama peternak">
                </div>

                <div class="form-group">
                    <label>Kelompok Susu <span>*</span></label>
                    <select>
                        <option value="">Pilih kelompok susu</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Email <span>*</span></label>
                    <input type="email" placeholder="email@example.com">
                </div>

                <div class="form-group">
                    <label>No HP <span>*</span></label>
                    <input type="text" placeholder="08xxxxxxxxxx">
                </div>

                <div class="form-group full">
                    <label>Password <span>*</span></label>
                    <input type="password" placeholder="Minimal 8 karakter">
                </div>

                <div class="form-group full">
                    <label>Alamat <span>*</span></label>
                    <textarea placeholder="Masukkan alamat lengkap"></textarea>
                </div>

            </div>

            <div class="modal-action">
                <button type="button" class="btn-outline" onclick="openConfirmCancel()">
                    Batal
                </button>
                <button type="button" class="btn-primary" onclick="openConfirmSave()">
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
            <button type="button" class="btn-outline" onclick="backToCreate()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="closeAllPeternakModal()">
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
            Anda yakin ingin menyimpan data peternak ini?<br>
            Pastikan seluruh data yang diinput sudah benar.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToCreate()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="submitForm()">
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
        <p>Data peternak berhasil disimpan.</p>

    </div>
</div>