//ambil elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var ajax = document.getElementById('ajax');

keyword.addEventListener('keyup', function () {


    //buat objekc ajax
    var xhr = new XMLHttpRequest();


    //cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200){
            ajax.innerHTML = xhr.responseText;
        }
    }


    //eksekusi ajax
    // xhr.open('GET', 'ajax/coba.html', true);
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();






});