// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById("keyword");
var container = document.getElementById("container");
var loadMore = document.getElementById("loadMore");
var slide = document.getElementById("carouselExampleFade");
var map = document.getElementById("map");

// tambahkan event ketika keyboard ditulis
keyword.addEventListener("keyup", function() {
    slide.setAttribute("style", "display:none;");
    container.setAttribute("style", "margin-top:25px;");
    map.setAttribute("style", "display:none;");
    // buat object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    };

    // eksekusi ajax
    xhr.open("GET", "ajax/mainProduk.php?keyword=" + keyword.value, true);
    xhr.send();

    if (keyword.value == "") {
        slide.setAttribute("style", "display:;");
        container.setAttribute("style", "margin-top:0;");
        map.setAttribute("style", "display:;");
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