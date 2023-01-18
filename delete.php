<?php
// include database connection file
include "koneksi.php";
$id = $_GET['id_product'];
// Delete user row from table based on given id
$result = mysqli_query($db, "DELETE FROM tb_product WHERE id_product=$id");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:kelola_product.php");
?>