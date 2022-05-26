	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');



	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener('keyup', function() {



	    // buat object ajax
	    var xhr = new XMLHttpRequest();

	    // cek kesiapan ajax
	    xhr.onreadystatechange = function() {
	        if (xhr.readyState == 4 && xhr.status == 200) {
	            container.innerHTML = xhr.responseText;
	        }
	    }

	    // eksekusi ajax
	    xhr.open('GET', 'ajax/mainProduk.php?keyword=' + keyword.value, true);
	    xhr.send();



	});












	var search = document.getElementById('cariin');
	var bar = document.getElementById('bar');
	var exit = document.getElementById('exit');

	search.addEventListener('click', function() {

	    var bar = document.getElementById('bar');
	    bar.setAttribute("style", "display:;");

	});

	exit.addEventListener('click', function() {

	    var bar = document.getElementById('bar');
	    bar.setAttribute("style", "display:none;");

	});