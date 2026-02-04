const overlay = document.getElementById('modalOverlay');

function showModal(id) {
    const modal = document.getElementById(id);
    if (!overlay || !modal) return;

    overlay.classList.add('show');
    modal.classList.add('show');
}

function hideModal(id) {
    const modal = document.getElementById(id);
    if (!overlay || !modal) return;

    modal.classList.remove('show');
    overlay.classList.remove('show');
}

function closeAllHargaModal() {
    document.querySelectorAll('.modal').forEach(m => {
        m.classList.remove('show');
    });
    overlay?.classList.remove('show');
}

function openTambahHarga() {
    showModal('modalTambah');
}

function openEditHarga() {
    showModal('modalEdit');
}

function openDeleteHarga() {
    showModal('modalDelete');
}

function openConfirmSaveHarga() {
    closeAllHargaModal();
    showModal('modalConfirm');
}

function openConfirmCancelHarga() {
    closeAllHargaModal();
    showModal('modalCancel');
}

function submitHarga() {
    closeAllHargaModal();
    showModal('modalSuccess');

    setTimeout(() => {
        closeAllHargaModal();
    }, 1500);
}

function cancelHarga() {
    closeAllHargaModal();
}

function openConfirmCancelHarga() {
    closeAllHargaModal();
    showModal('modalCancel');
}

function openConfirmSaveHarga() {
    closeAllHargaModal();
    showModal('modalConfirm');
}

function backToTambahHarga() {
    closeAllHargaModal();
    showModal('modalTambah');
}

function submitHarga() {
    closeAllHargaModal();
    showModal('modalSuccess');

    setTimeout(() => {
        closeAllHargaModal();
    }, 1500);
}

function cancelHarga() {
    closeAllHargaModal();
}

function openConfirmCancelHargaEdit() {
        closeAllHargaModal();
        showHargaModal('modalCancel');
    }

    function openConfirmSaveHargaEdit() {
        closeAllHargaModal();
        showHargaModal('modalConfirm');
    }

    function backToEditHarga() {
        closeAllHargaModal();
        showHargaModal('modalEdit');
    }

    function submitEditHarga() {
        closeAllHargaModal();
        showHargaModal('modalSuccess');

        setTimeout(() => {
            closeAllHargaModal();
        }, 1500);
    }

    function cancelEditHarga() {
        closeAllHargaModal();
    }

    function showHargaModal(id) {
        document.getElementById('modalOverlay').classList.add('show');
        document.getElementById(id).classList.add('show');
    }

    function closeAllHargaModal() {
        document.querySelectorAll('.modal').forEach(m => m.classList.remove('show'));
        document.getElementById('modalOverlay').classList.remove('show');
    }

    function openDeleteHarga() {
        closeAllHargaModal();
        showHargaModal('modalDelete');
    }

    function closeDeleteHarga() {
        closeAllHargaModal();
    }

    function confirmDeleteHarga() {
        closeAllHargaModal();
        showHargaModal('modalDeleteSuccess');

        setTimeout(() => {
            closeAllHargaModal();
        }, 1500);
    }
