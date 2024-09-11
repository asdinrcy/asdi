<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>
    DATA SISWA BY ASDI</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">ASDI WEB TECH</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>DAFTAR PESERTA PELATIHAN</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>

     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>No</th>
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <select class="form-select" size aria-label="Size 3 select example">
                            <option selected>Your Gender</option>
                            <option value="1">Girl</option>
                            <option value="2">Boy</option>
                            <option value="3">Hmm</option>
                    </select>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <i class="bi bi-arrow-right-circle"></i>
    <a href="create.php" class="btn btn-secondary" role="button">
        Tambah Data
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
        </svg>
    </a>
</div>
</body>
</html>
