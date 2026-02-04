const overlay = document.getElementById('modalOverlay');
let currentEmail = '';
let activeModal = null;
const resetSuccessText = document.getElementById('resetSuccessUsername');

function show(id) {
    overlay?.classList.add('show');
    document.getElementById(id)?.classList.add('show');
}

function hide(id) {
    document.getElementById(id)?.classList.remove('show');
}

function openModal(id) {
    show(id);
}

function openEditModal(data) {
    activeModal = 'edit';
    show('modalEdit');

    document.getElementById('editNama').value = data.nama;
    document.getElementById('editEmail').value = data.email;
    document.getElementById('editHp').value = data.hp;
    document.getElementById('editAlamat').value = data.alamat;
    document.getElementById('editKelompok').value = data.kelompok;
}

function openConfirmCancel(type) {
    activeModal = type;
    hide('modalCreate');
    hide('modalEdit');
    show('modalCancel');
}

function openConfirmSave(type) {
    activeModal = type;
    hide('modalCreate');
    hide('modalEdit');
    show('modalConfirm');
}

function backToCreate() {
    hide('modalCancel');
    hide('modalConfirm');

    if (activeModal === 'edit') {
        show('modalEdit');
    } else {
        show('modalCreate');
    }
}

function submitForm() {
    hide('modalConfirm');
    show('modalSuccess');

    setTimeout(() => {
        closeAllPeternakModal();
    }, 1500);
}

function openDelete() {
    show('modalDelete');
}

function closeDelete() {
    hide('modalDelete');
    overlay?.classList.remove('show');
}

function confirmDelete() {
    hide('modalDelete');
    show('modalDeleteSuccess');

    setTimeout(() => {
        hide('modalDeleteSuccess');
        overlay?.classList.remove('show');
    }, 1500);
}

function openReset(email) {
    currentEmail = email;

    document.getElementById('resetEmail').textContent = email;
    document.getElementById('resetSuccessEmail').textContent = email;

    document.getElementById('modalOverlay').classList.add('show');
    document.getElementById('modalReset').classList.add('show');
}

function confirmReset() {
    const overlay = document.getElementById('modalOverlay');
    const modalReset = document.getElementById('modalReset');
    const modalSuccess = document.getElementById('modalResetSuccess');

    if (!overlay || !modalReset || !modalSuccess) {
        console.error('Modal reset tidak ditemukan');
        return;
    }

    // Tutup modal reset
    modalReset.classList.remove('show');

    // Tampilkan success
    overlay.classList.add('show');
    modalSuccess.classList.add('show');

    // Delay lalu redirect
    setTimeout(() => {
        modalSuccess.classList.remove('show');
        overlay.classList.remove('show');
        window.location.href = '/admin/peternak';
    }, 1500);
}

function closeReset() {
    document.getElementById('modalReset')?.classList.remove('show');
    document.getElementById('modalOverlay')?.classList.remove('show');
}

function closeAllPeternakModal() {
    document.querySelectorAll('.modal').forEach(m => m.classList.remove('show'));
    overlay?.classList.remove('show');
}

document.addEventListener('DOMContentLoaded', function () {

    const tabs = document.querySelectorAll('.peternak-tabs .tab');
    const contents = document.querySelectorAll('.tab-content');
    const btnTambah = document.getElementById('btnTambah');

    if (!tabs.length || !contents.length || !btnTambah) return;

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', function () {

            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            contents[index].classList.add('active');

            btnTambah.style.display = (index === 1)
                ? 'none'
                : 'inline-flex';
        });
    });

});

function toggleStatus(checkbox) {
    const text = checkbox
        .closest('.toggle-wrapper')
        .querySelector('.toggle-text');

    if (checkbox.checked) {
        text.textContent = 'Aktif';
        text.classList.remove('inactive');
        text.classList.add('active');
    } else {
        text.textContent = 'Tidak Aktif';
        text.classList.remove('active');
        text.classList.add('inactive');
    }
}