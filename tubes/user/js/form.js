// nav
const btnBars = document.querySelector(".fa-bars");
const btnMinus = document.querySelector(".fa-minus");
const show = document.querySelector(".navbar-collapse");

btnBars.addEventListener("click", function() {
    btnBars.classList.toggle("d-none");
    btnMinus.classList.toggle("d-none");
    show.setAttribute("style", "animation:slidedown 0.5s ease forwards;");
});

btnMinus.addEventListener("click", function() {
    btnBars.classList.toggle("d-none");
    btnMinus.classList.toggle("d-none");
    show.setAttribute("style", "animation:slideup 0.5s ease forwards;");
});

const scriptURL =
    "https://script.google.com/macros/s/AKfycbyc9wkhvm2M99jpizayl2WeDHbrQm5jYTP5Ht4-dveg8cSqIbTWMp---ElxVTaZdGw/exec";
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