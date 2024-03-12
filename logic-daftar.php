<?php 
include("koneksi.php");

if(isset($_POST['daftar'])){


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

// Pindahkan file gambar ke direktori tujuan
if (move_uploaded_file($gambar_tmp, $target_dir.$gambar)) {
    // File berhasil diunggah, lanjutkan dengan penyimpanan data ke database
    $sql = "INSERT INTO maba(nama, npm, prodi, email, ormawa, gambar) VALUES ('$nama', '$npm', '$prodi', '$email', '$ormawa', '$gambar')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }
} else {
    echo "Maaf, terjadi kesalahan saat mengunggah file.";
}
} else {
die("Akses dilarang...");
}

?>