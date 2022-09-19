<?php
require '../require/function.php';
$keyword = $_GET["keyword"];

$query = ("SELECT * FROM siswa
WHERE
nama LIKE '%$keyword%'or
nis LIKE '%$keyword%'or
jurusan LIKE '%$keyword%'
");
$mahasiswa = query($query);

?>

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