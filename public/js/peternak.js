const overlay = document.getElementById('modalOverlay');
let activeModal = null;

function show(id) {
    const el = document.getElementById(id);
    if (el) el.classList.add('show');
}

function hide(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove('show');
}

function openModal(id) {
    overlay.classList.add('show');
    show(id);
}

function closeModal(id) {
    hide(id);
}

function closeAllPeternakModal() {
    document.querySelectorAll('.modal').forEach(m => m.classList.remove('show'));
    overlay.classList.remove('show');
}

function openConfirmSaveCreate() {
    activeModal = 'create';
    hide('modalCreate');
    overlay.classList.add('show');
    show('modalConfirm');
}

function openConfirmCancel() {
    hide('modalEdit');
    hide('modalCreate');

    overlay.classList.add('show');
    show('modalCancel');
}

function backToCreate() {
    hide('modalCancel');
    overlay.classList.add('show');

    if (activeModal === 'edit') {
        show('modalEdit');
    } else {
        show('modalCreate');
    }
}

function submitForm() {

    const form = document.getElementById('formCreate');

    const nama = form.nama.value.trim();
    const email = form.email.value.trim();
    const password = form.password.value.trim();
    const noHp = form.no_hp.value.trim();
    const alamat = form.alamat.value.trim();

    if (!nama || !email || !password || !noHp || !alamat) {
        alert('⚠️ Semua field wajib diisi');
        return;
    }

    if (!/^\d{10,12}$/.test(noHp)) {
        alert('⚠️ No HP harus angka dan maksimal 12 digit');
        return;
    }

    const data = new FormData(form);

    fetch('/admin/peternak/store', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: data
    })
        .then(res => res.json().then(data => {
            if (!res.ok) throw data;
            return data;
        }))
        .then(() => {
            hide('modalConfirm');

            overlay.classList.add('show');
            show('modalSuccess');

            setTimeout(() => {
                closeAllPeternakModal();
                location.reload();
            }, 1000);
        })
        .catch(err => {
            console.error(err);
            alert(err.message || 'Server error');
        });
}

function openEditFromButton(btn) {
    activeModal = 'edit';

    const data = btn.dataset;

    document.getElementById('editNama').value = data.nama || '';
    document.getElementById('editEmail').value = data.email || '';
    document.getElementById('editHp').value = data.hp || '';
    document.getElementById('editAlamat').value = data.alamat || '';

    const form = document.getElementById('formEdit');
    form.dataset.id = data.id;

    openModal('modalEdit');
}

function openConfirmSaveEdit() {
    activeModal = 'edit';

    hide('modalEdit');
    overlay.classList.add('show');
    show('modalConfirmUpdate');
}

function confirmEditAjax() {
    const form = document.getElementById('formEdit');
    const id = form.dataset.id;

    const email = form.email.value.trim();
    const noHp = form.no_hp.value.trim();

    if (email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        alert('⚠️ Format email tidak valid');
        return;
    }

    if (noHp && !/^\d{10,12}$/.test(noHp)) {
        alert('⚠️ No HP harus 10–12 digit angka');
        return;
    }

    const formData = new FormData(form);
    formData.append('_method', 'PUT');

    fetch(`/admin/peternak/update/${id}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: formData
    })
        .then(res => {
            if (!res.ok) throw new Error('Gagal update');
            return res.json();
        })
        .then(() => {
            hide('modalConfirmUpdate');
            overlay.classList.add('show');
            show('modalSuccessUpdate');

            const row = document.querySelector(
                `.peternak-row[data-id="${id}"]`
            );

            if (row) {
                row.querySelector('.col-nama').innerText = form.nama.value;
                row.querySelector('.col-alamat').innerText = form.alamat.value;
                row.querySelector('.col-hp').innerText = form.no_hp.value;

                const btnEdit = row.querySelector('.icon-btn.edit');
                if (btnEdit) {
                    btnEdit.dataset.nama = form.nama.value;
                    btnEdit.dataset.email = form.email.value;
                    btnEdit.dataset.hp = form.no_hp.value;
                    btnEdit.dataset.alamat = form.alamat.value;
                }
            }

            setTimeout(() => {
                closeAllPeternakModal();
            }, 1000);
        });
}

document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.peternak-tabs .tab');
    const contents = document.querySelectorAll('.tab-content');
    const btnTambah = document.getElementById('btnTambah');

    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            contents[i].classList.add('active');

            btnTambah.style.display = (i === 1) ? 'none' : 'inline-flex';
        });
    });
});

function handleConfirm() {
    if (activeModal === 'edit') {
        confirmEditAjax();
    } else {
        submitForm();
    }
}

let deleteId = null;

function openDeleteModal(btn) {
    deleteId = btn.dataset.id;
    overlay.classList.add('show');
    show('modalDelete');
}

function confirmDelete() {
    fetch(`admin/peternak/${deleteId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
        .then(res => res.json().then(data => {
            if (!res.ok) throw data;
            return data;
        }))
        .then(() => {
            hide('modalDelete');

            overlay.classList.add('show');
            show('modalDeleteSuccess');

            setTimeout(() => {
                location.reload();
            }, 1000);
        })
    /*.catch(err => {
        console.error(err);
        alert(err.message || 'Gagal menghapus data');
    });*/
}
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const tabs = document.querySelectorAll('.peternak-tabs .tab');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();

        const activeTabIndex = [...tabs].findIndex(tab =>
            tab.classList.contains('active')
        );

        if (activeTabIndex === 0) {
            document.querySelectorAll('.peternak-row').forEach(row => {
                const nama = row.children[1].innerText.toLowerCase();
                row.style.display = nama.includes(keyword) ? '' : 'none';
            });
        } else {
            document.querySelectorAll('.akun-row').forEach(row => {
                const emailFull = row.children[1].innerText.toLowerCase();
                const emailName = emailFull.split('@')[0]; // sebelum @

                row.style.display = emailName.includes(keyword) ? '' : 'none';
            });
        }
    });
});


let resetEmail = null;
let resetUserId = null;

function openResetModal(btn) {
    resetEmail = btn.dataset.email;
    resetUserId = btn.dataset.id;

    document.getElementById('resetEmail').innerText = resetEmail;
    document.getElementById('resetSuccessEmail').innerText = resetEmail;

    overlay.classList.add('show');
    show('modalReset');
}

function confirmReset() {
    fetch(`/admin/akun-peternak/reset-password/${resetUserId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
        .then(res => res.json())
        .then(data => {
            if (!data.success) throw data;

            hide('modalReset');
            overlay.classList.add('show');
            show('modalResetSuccess');

            setTimeout(() => {
                closeAllPeternakModal();
            }, 2000);
        })
        .catch(() => {
            alert('Gagal reset password');
        });
}
