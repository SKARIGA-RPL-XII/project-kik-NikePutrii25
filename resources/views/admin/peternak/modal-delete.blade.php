<div class="modal" id="modalDelete">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-trash"></i>
        </div>

        <h3>Konfirmasi Hapus Data</h3>
        <p>
            Anda yakin ingin menghapus data peternak ini?<br>
            <b>Tindakan ini tidak dapat dibatalkan.</b>
        </p>

        <div class="modal-action center">
            <button class="btn-outline" onclick="closeAllPeternakModal()">
                Batal
            </button>
            <button class="btn-danger" onclick="confirmDelete()">
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
        <p>Data peternak berhasil dihapus.</p>

    </div>
</div>