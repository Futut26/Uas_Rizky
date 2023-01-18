<?php
include "koneksi.php";
// Check If form submitted, insert form data into users table.

if (isset($_POST['update'])) {
    $nama_product = $_POST['nama_product'];
    $id_product = $_POST['id_product'];
    $deskripsi_product = $_POST['deskripsi_product'];
    date_default_timezone_set('Asia/jakarta');
    $updated_at = date('Y-m-d H:i:');
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['gambar']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($file_tmp, 'images/produk/' . $nama);
    $sql = mysqli_query ($db, "UPDATE tb_product SET nama_product='$nama_product', gambar='$nama', deskripsi_product='$deskripsi_product', update_at='$updated_at' WHERE id_product=$id_product");
    if( $sql ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: kelola_product.php');
        
    } else {
        // kalau gagal tampilkan pesan
        echo "<script>alert('Data Berhasil Disimpan');window.location='kelola_product.php';</script>";
        die();
        header("location: kelola_product.php");
        
    }

}
?>