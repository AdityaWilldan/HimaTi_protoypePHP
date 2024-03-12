<?php 
include "koneksi.php";

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
 
    // cek apakah tidak ada gambar yang di upload
    if( $error === 4){
       echo "<script>
             alert('pilih gambar terlebih dahulu')
             </script>";
             return false;
    }
 
    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
       echo "<script>
       alert('yang anda upload bukan gambar')
       </script>";
       return false;
    }
    // cek jika ukurannya terlalu besar
    if( $ukuranFile > 1000000) {
       "<script>
             alert('ukuran gambar terlalu besar')
             </script>";
             return false;
    }
    // lolos pengecekan, gambar siap di upload
    // generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
 
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
 
 
 }
?>