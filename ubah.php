<?php
require 'require/function.php';

//ambil data diurl
$id = $_GET["id"];

//query data siswa berdasarkan id
$mhs = query("SELECT * FROM siswa WHERE id = $id")[0];

//cek apakah tombil submit ditekan atau belum
if (isset($_POST["submit"])) {


    //cek apakah data berhasil diubah atau belum
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('data berhasil diubah');
    document.location.href = 'index.php';
    </script>";
    } else {
        "<script>
                alert('data gagal diubah');
            document.location.href = 'index.php';
            </script>";
    }
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

    <title>Hello, world!</title>
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
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h5>Halaman Login</h5>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" name="nis" id="nis" placeholder="Masukan NIM Anda" value="<?= $mhs["nis"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Anda" value="<?= $mhs["nama"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email Anda" value="<?= $mhs["email"]; ?>">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="jurusan">Pilih Jurusan</label>
                                <select name="jurusan" id="jurusan" class="custom-select" required>
                                    <option>--Pilih Jurusan--</option>
                                    <option name="jurusan" id="jurusan">Teknik Komputer</option>
                                    <option name="jurusan" id="jurusan">Teknik Otomotif</option>
                                    <option name="jurusan" id="jurusan">Teknik Informatika</option>
                                    <option name="jurusan" id="jurusan">Akuntansi</option>
                                    <option name="jurusan" id="jurusan">Administrasi Perkantoran</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar</label>
                            <img src="img/<?= $mhs['gambar']; ?>" width="50px">
                            <input type="file" name="gambar" id="gambar">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir from -->

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
</body>

</html>