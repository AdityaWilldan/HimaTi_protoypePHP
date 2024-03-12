<?php 
include ("koneksi.php");

if(isset($_POST['save'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $ormawa = $_POST['ormawa'];
    // $gambar = $_POST['gambar'];
    $gambar = $_FILES['gambar']['name'];


    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $target_dir = "img/";
    // $target_file = $target_dir . basename($gambar);

if (move_uploaded_file($gambar_tmp, $target_dir.$gambar)) {
    // Hapus gambar lama jika berhasil diunggah
    $sqlGetOldImage = "SELECT gambar FROM maba WHERE id='$id'";
    $queryGetOldImage = mysqli_query($db, $sqlGetOldImage);
    $oldImage = mysqli_fetch_assoc($queryGetOldImage)['gambar'];

    if ($oldImage && file_exists($target_dir . $oldImage)) {
        unlink($target_dir . $oldImage);
    }
} else {
    echo "Maaf, terjadi kesalahan saat mengunggah file.";
}

    $sql = "UPDATE maba SET nama='$nama', npm='$npm', prodi ='$prodi', email='$email', ormawa='$ormawa', gambar='$gambar' WHERE id='$id'";
    $query = mysqli_query($db,$sql);

    if($query){
        header("Location: list-mahasiswa.php");
    } else{
        die("gagal mengupdate");
    }

} else{
    die("akses di larang..");
}


?>