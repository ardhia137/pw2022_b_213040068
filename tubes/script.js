
// ambil elemen2 yang dibutuhkan
var keyword = document.getElementById("keyword");
var produk = document.getElementById("produk");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function() {
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            produk.innerHTML = xhr.responseText;
        }
    };

    // eksekusi ajax
    xhr.open("GET", "assets/ajax/produk.php?keyword=" + keyword.value, true);
    xhr.send();
});