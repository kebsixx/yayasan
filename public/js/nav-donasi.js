// // Mengambil elemen-elemen
// const donasiMenu = document.getElementById('donasiMenu');
// const donasiPopup = document.getElementById('donasiPopup');
// const overlay = document.getElementById('overlay');
// const closePopup = document.getElementById('closePopup');

// // Menampilkan popup
// donasiMenu.addEventListener('click', (e) => {
//   e.preventDefault();
//   donasiPopup.classList.add('active'); // Tambahkan class 'active'
//   overlay.classList.add('active');
// });

// // Menutup popup
// const closePopupHandler = () => {
//   donasiPopup.classList.remove('active');
//   overlay.classList.remove('active');
// };

// closePopup.addEventListener('click', closePopupHandler);
// overlay.addEventListener('click', closePopupHandler);

const donasiMenu = document.getElementById('donasiMenu');
const donasiPopup = document.getElementById('donasiPopup');
const overlay = document.getElementById('overlay');
const closePopup = document.getElementById('closePopup');

// Fungsi untuk membuka popup
donasiMenu.addEventListener('click', (e) => {
  e.preventDefault();
  donasiPopup.classList.add('active');
  overlay.classList.add('active');
});

// Fungsi untuk menutup popup
const closePopupHandler = () => {
  donasiPopup.classList.remove('active');
  overlay.classList.remove('active');
};

closePopup.addEventListener('click', closePopupHandler);
overlay.addEventListener('click', closePopupHandler);
