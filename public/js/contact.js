const scriptURL = "https://script.google.com/macros/s/AKfycbwAT5XTe6W1Lp7nWvc0J_p9HyhW_nelIADwbSskBLy6QJPzGUY7vSYZcSAToWmoWONG/exec";
const form = document.forms["submit-to-google-sheet"];
const btnKirim = document.getElementById("btnKirim");
const btnLoading = document.getElementById("btnLoading");
const closeButton = document.getElementById("closeButton");
const myAlert = document.getElementById("alert");

closeButton.addEventListener("click", () => {
  myAlert.classList.toggle("d-none");
});

form.addEventListener("submit", (e) => {
  e.preventDefault();
  btnKirim.classList.toggle("d-none");
  btnLoading.classList.toggle("d-none");

  // Mendapatkan tanggal, hari, dan waktu
  const date = new Date();

  // Format Tanggal: dd-mm-yyyy
  const day = date.getDate().toString().padStart(2, '0');       // Hari (dd)
  const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Bulan (mm) - ingat bulan dimulai dari 0
  const year = date.getFullYear();                               // Tahun (yyyy)
  const tanggal = `${day}-${month}-${year}`;                    // Format gabungan

  // Nama Hari
  const hari = date.toLocaleDateString('id-ID', { weekday: 'long' }); // Bahasa Indonesia

  // Waktu: HH:mm:ss
  const jam = date.getHours().toString().padStart(2, '0');
  const menit = date.getMinutes().toString().padStart(2, '0');
  const detik = date.getSeconds().toString().padStart(2, '0');
  const waktu = `${jam}:${menit}:${detik}`;

  const formData = new FormData(form);
  formData.append("tanggal", tanggal);
  formData.append("hari", hari);
  formData.append("waktu", waktu);

  fetch(scriptURL, { method: "POST", body: formData })
    .then((response) => {
      btnLoading.classList.toggle("d-none");
      btnKirim.classList.toggle("d-none");
      myAlert.classList.toggle("d-none");
      form.reset();
      console.log("Success!", response);
    })
    .catch((error) => console.error("Error!", error.message));
});

