document.querySelectorAll('.filter-btn').forEach(btn => {

btn.addEventListener('click', function(){

const target = this.dataset.target;

document
.querySelectorAll('.filter-menu')
.forEach(menu => menu.classList.remove('show'));

document
.getElementById(target)
.classList.toggle('show');

});

});


document.querySelectorAll('#filterWaktu li').forEach(item => {
item.addEventListener('click', function(){

document.getElementById('labelWaktu').innerText = this.innerText;
document.getElementById('inputWaktu').value = this.dataset.value;

});
});

document.querySelectorAll('#filterBulan li').forEach(item => {
item.addEventListener('click', function(){

document.getElementById('labelBulan').innerText = this.innerText;
document.getElementById('inputBulan').value = this.dataset.value;

});
});

document.querySelectorAll('#filterTahun li').forEach(item => {
item.addEventListener('click', function(){

document.getElementById('labelTahun').innerText = this.innerText;
document.getElementById('inputTahun').value = this.dataset.value;

});
});


document.addEventListener('click', function(e){

if(!e.target.closest('.filter-dropdown')){
document
.querySelectorAll('.filter-menu')
.forEach(menu => menu.classList.remove('show'));
}

});