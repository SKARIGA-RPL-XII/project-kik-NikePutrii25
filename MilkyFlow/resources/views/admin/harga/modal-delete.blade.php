<div class="modal" id="modalDelete">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-trash"></i>
        </div>

        <h3>Konfirmasi Hapus Data</h3>
        <p>
            Anda yakin ingin menghapus data harga dan kelompok ini?<br>
            <strong>Tindakan ini tidak dapat dibatalkan.</strong>
        </p>

        <div class="modal-action center">
            <button
                type="button"
                class="btn-outline"
                onclick="closeDeleteHarga()">
                Batal
            </button>

            <button
                type="button"
                class="btn-danger"
                onclick="confirmDeleteHarga()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>


<div class="modal" id="modalDeleteSuccess">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Data harga dan kelompok berhasil dihapus.</p>

    </div>
</div>
