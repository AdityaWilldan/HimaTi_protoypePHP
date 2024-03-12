<?php 
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<header>
        <h3>daftar mahasiswa Teknik Informatika 1 A</h3>
    </header>

    <nav>
        <button class="btn btn-outline-success">
        <a href="form-daftar.php">[+] Tambah Baru</a>
        </button>
    </nav>

    <br>
<div class="container">
    <div class="row">
        <div class="col-20 mx-auto">
        <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <!-- <th>No</th> -->
                <th>Nama</th>
                <th>Npm</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>Ormawa</th>
                <th>Gambar</th>
                <th>Tindakan</th>
            </tr>
        </thead> 

        <tbody>

        <?php 
        $sql = "SELECT * FROM maba";
        $query = mysqli_query($db,$sql);

        while($mahasiswa = mysqli_fetch_array($query)){
            echo "<tr>";

            // echo "<td>".$mahasiswa['id']."</td>";
            echo "<td>".$mahasiswa['nama']."</td>";
            echo "<td>".$mahasiswa['npm']."</td>";
            echo "<td>".$mahasiswa['prodi']."</td>";
            echo "<td>".$mahasiswa['email']."</td>";
            echo "<td>".$mahasiswa['ormawa']."</td>";
            

            echo "<td>";
            echo "<img src='img/".$mahasiswa['gambar']."' onerror=\"this.onerror=null; this.src='https://i.pinimg.com/originals/77/c7/01/77c701da8e4c052f89258d83820ea39b.png';\" alt='' width='80'>";
            echo "</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$mahasiswa['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$mahasiswa['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
            }
        
        
        
        
        
            ?>

            </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>_
</body>
</html>