<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

//memanggil fungction
require 'require/function.php';

//cek apakah submit ditekan
if (isset($_POST["submit"])) {


    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahan');
            </script>";
    } else {
        echo "<script>
                alert('data gagal ditambahan');
            </script>";
    }
}


//memanggil query di function
$mahasiswa = query("SELECT * FROM siswa");

//tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Halaman Admin</title>
</head>

<body>
    <!-- form login -->
    <div class="container-sm">
        <div class="jumbotron jumbotron-fluid">
            <!-- <?php if (!isset($error)) : ?>
                <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                </div>
            <?php elseif (isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!
                </div>
            <?php endif; ?> -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h5>Halaman Login</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" autocomplete="off" class="form-control" name="nis" id="nis" placeholder="Masukan NIM Anda">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" autocomplete="off" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Anda">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" autocomplete="off" class="form-control" name="email" id="email" placeholder="Masukan Email Anda">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="jurusan">Pilih Jurusan</label>
                                <select name="jurusan" id="jurusan" class="custom-select" required>
                                    <option value="">--Pilih Jurusan--</option>
                                    <option value="Teknik Komputer">Teknik Komputer</option>
                                    <option value="Teknik otomatif">Teknik Otomotif</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                    <a href="logout.php">keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir from -->

    <!-- cari -->

    <div class="container">
        <div class="row">
            <form action="" method="post">
                <input class="form-control-sm" type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
                <button type="submit" name="cari" class="btn btn-secondary" id="tombol-cari">cari</button>
            </form>
        </div>
    </div>

    <!-- akhir cari -->

    <!-- tabel form -->

    <div class="container-md" id="ajax">
        <table border="1" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">GAMBAR</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($mahasiswa as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row["id"]; ?>">
                                <button class="btn btn-primary">Ubah</button>
                            </a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" id="">
                                <button class="btn btn-dark ">Hapus</button>
                            </a>
                        </td>
                        <td><img src="img/<?= $row["gambar"]; ?>" width="50px"></td>
                        <td><?= $row["nis"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- akhir tabel form -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

    //s
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>