<?php 
include("koneksi.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sqlShow = "SELECT * FROM maba WHERE id='$id'";
    $queryShow =  mysqli_query($db,$sqlShow);
    $resutl = mysqli_fetch_assoc($queryShow);
    
    unlink("img/".$resutl['gambar']);

    $sql = "DELETE FROM maba WHERE id=$id";
    $query = mysqli_query($db, $sql);


    if($query){
        header('Location: list-mahasiswa.php');
    } 
    else{
        die("gagal menghapus...");
    }

} else{
    die("akses di larang...");
}



?>