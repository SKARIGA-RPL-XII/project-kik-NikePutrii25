const overlay = document.getElementById('modalOverlay');

function showModal(id) {
    const modal = document.getElementById(id);
    if (!overlay || !modal) return;

    overlay.classList.add('show');
    modal.classList.add('show');
}

function closeAllHargaModal() {
    document.querySelectorAll('.modal').forEach(m => {
        m.classList.remove('show');
    });
    overlay.classList.remove('show');
}

function openTambahHarga() {
    closeAllHargaModal();
    showModal('modalTambah');
}

function openConfirmSaveHarga() {
    closeAllHargaModal();
    showModal('modalConfirmTambah');
}

function backToTambahHarga() {
    closeAllHargaModal();
    showModal('modalTambah');
}

function submitTambahHarga() {
    closeAllHargaModal();
    showModal('modalSuccessTambah');

    setTimeout(() => {
        document.getElementById('formCreate').submit();
    }, 1200);
}

function cancelHarga() {
    closeAllHargaModal();
}

function openEditHarga(id, kelompok, harga, tanggal) {
    closeAllHargaModal();

    document.getElementById('editId').value = id;
    document.getElementById('editKelompok').value = kelompok;
    document.getElementById('editHarga').value = formatRupiah(harga);
    document.getElementById('editTglMulai').value = tanggal;

    document.getElementById('formEdit').action =
        `/admin/harga-susu/${id}`;

    showModal('modalEdit');
}

function openConfirmSaveHargaEdit() {
    closeAllHargaModal();
    showModal('modalConfirmEdit');
}

function backToEditHarga() {
    closeAllHargaModal();
    showModal('modalEdit');
}

function submitEditHarga() {
    closeAllHargaModal();
    showModal('modalSuccessEdit');

    setTimeout(() => {
        document.getElementById('formEdit').submit();
    }, 1200);
}

function cancelEditHarga() {
    closeAllHargaModal();
}

function openDeleteHarga(id) {
    closeAllHargaModal();

    document.getElementById('formDelete').action =
        `/admin/harga-susu/${id}`;

    showModal('modalDelete');
}

function closeDeleteHarga() {
    closeAllHargaModal();
}

function confirmDeleteHarga() {
    closeAllHargaModal();

    showModal('modalDeleteSuccess');

    setTimeout(() => {
        document.getElementById('formDelete').submit();
    }, 1200);
}

function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID').format(angka);
}

document.addEventListener('input', function (e) {
    if (e.target.name === 'harga_per_liter' || e.target.id === 'editHarga') {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = formatRupiah(value);
    }
});
