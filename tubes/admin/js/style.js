// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById("keyword");
var container = document.getElementById("container");
var page = document.getElementById("page");
var halaman = document.getElementById("halaman");

// function ajax dengan baik
function doStuff() {
    // buat object ajax
    var xhr = new XMLHttpRequest();
    page.classList.remove("d-none");

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    };

    // eksekusi ajax
    xhr.open("GET", "ajax/produkNormal.php?page=" + halaman.value, true);
    xhr.send();
}

// tambahkan event ketika keyboard ditulis
keyword.addEventListener("keyup", function() {
    // buat object ajax
    var xhr = new XMLHttpRequest();
    page.classList.add("d-none");

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    };
    // memunculkan page atau refresh halaman
    if (keyword.value === "") {
        doStuff();
    } else {
        // eksekusi ajax
        xhr.open("GET", "ajax/produk.php?keyword=" + keyword.value, true);
        xhr.send();
    }
});

// button search
var search = document.getElementById("cariin");
var bar = document.getElementById("bar");
var exit = document.getElementById("exit");

// nav
const btnBars = document.querySelector(".fa-bars");
const btnMinus = document.querySelector(".fa-minus");
const show = document.querySelector(".navbar-collapse");

search.addEventListener("click", function() {
    var bar = document.getElementById("bar");
    bar.setAttribute("style", "display:;");
    btnBars.classList.remove("d-none");
    btnMinus.classList.add("d-none");
    show.setAttribute("style", "animation:slideup 0.5s ease forwards;");
});

exit.addEventListener("click", function() {
    var bar = document.getElementById("bar");
    bar.setAttribute("style", "display:none;");
});

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