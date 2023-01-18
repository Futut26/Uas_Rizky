<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" type="image/png" href="images/logo/logo_pandu.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="vendors/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row mt-10">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data</h4>
                    </div>
                    <div class="card-body">

                        <?php
                        include 'koneksi.php';
                        $id = $_GET['id_product'];
                        $data = mysqli_query($db, "select * from tb_product where id_product='$id'");
                        $data = mysqli_fetch_array($data)
                        ?>
                        <img src="images/produk/<?= $data['gambar']?>" width="200" alt="">
            
                        <form class='mt-3' method="POST" action="proses_edit.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Ubah Gambar product</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                                <input type="hidden" class="form-control" id="id_product" name="id_product" value="<?= $data['id_product'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nama_product" class="form-label">Nama product</label>
                                <input type="text" class="form-control" id="nama_product" name="nama_product" value="<?= $data['nama_product']?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_product" class="form-label">Deskripsi</label>
                                <textarea type="text" class="form-control" id="deskripsi_product" name="deskripsi_product"  value="<?= $data['deskripsi_product']?>"><?= $data['deskripsi_product']?></textarea>
                            </div>
                            <input type="submit" name="update" value="update" class="btn btn-primary">
                            <a href="kelola_product.php" class="btn btn-success">Kembali</a>
                        </form>
                    </div>


                    <script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                    <script src="js/bootstrap.bundle.min.js"></script>
                    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
                    <script src="js/main.js"></script>
</body>

</html>


