	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');
	var page = document.getElementById('page');



	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener('keyup', function() {

	    var page = document.getElementById('page');
	    page.setAttribute("style", "display:none;");

	    // buat object ajax
	    var xhr = new XMLHttpRequest();

	    // cek kesiapan ajax
	    xhr.onreadystatechange = function() {
	        if (xhr.readyState == 4 && xhr.status == 200) {
	            container.innerHTML = xhr.responseText;
	        }
	    }

	    // eksekusi ajax
	    xhr.open('GET', '../ajax/produk.php?keyword=' + keyword.value, true);
	    xhr.send();

	    // memunculkan page atau refresh halaman
	    if (keyword.value === '') {
	        location.reload();
	    }


	});