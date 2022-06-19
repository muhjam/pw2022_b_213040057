// nav
const btnBars = document.querySelector(".fa-bars");
const btnMinus = document.querySelector(".fa-minus");

btnBars.addEventListener("click", function() {
    btnBars.classList.toggle("d-none");
    btnMinus.classList.toggle("d-none");
});

btnMinus.addEventListener("click", function() {
    btnBars.classList.toggle("d-none");
    btnMinus.classList.toggle("d-none");
});

const scriptURL =
    "https://script.google.com/macros/s/AKfycbzSt1bcuGMf1X3xK2yY7ocsKTA1ngPMFtHdfllE7bUNdJajko6meJ4FXX3PeJGFj0QUXQ/exec";
const form = document.forms["goturthinqs-contact-from"];

const btnKirim = document.querySelector(".btn-kirim");
const btnLoading = document.querySelector(".btn-loading");
const myAlert = document.querySelector(".my-alert");

const gagalAlert = document.querySelector(".gagal-alert");

form.addEventListener("submit", (e) => {
    e.preventDefault();

    // ketika tombol loading di klik
    // tampilkan tombol loading hilangkan tombol kirim
    btnLoading.classList.toggle("d-none");
    btnKirim.classList.toggle("d-none");

    fetch(scriptURL, {
            method: "POST",
            body: new FormData(form),
        })
        .then((response) => {
            // tampilkan tombol kirim, tampilkan tombol loading
            btnLoading.classList.toggle("d-none");
            btnKirim.classList.toggle("d-none");

            // tampilkan alert
            myAlert.classList.toggle("d-none");

            // rest form
            form.reset();
            console.log("Success!", response);
        })
        .catch((error) => {
            // tampilkan tombol kirim, tampilkan tombol loading
            btnLoading.classList.toggle("d-none");
            btnKirim.classList.toggle("d-none");

            // tampilkan alert
            gagalAlert.classList.toggle("d-none");

            // rest form
            form.reset();

            console.error("Error!", error.message);
        });
});