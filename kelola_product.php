<?php include("koneksi.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="vendors/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/app.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-center">
                        <div class="logo">
                            <a href="index.php">Komputer Rizky</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item ">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-shop"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="kelola_product.php" class='sidebar-link'>
                                <i class="bi-card-checklist"></i>
                                <span>Kelola Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item ">
                            <a href="logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">

                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="main-content">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Product</h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    <section class="section" id="form-and-scrolling-components">
                        <div class="row" id="table-hover-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="d-flex col-lg-6 mb-3" action="" method="post">
                                                <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" name="keyword" id="keyword" autocomplete="off">
                                                <button class="btn btn-primary" type="submit" name="cari" id="tombolCari"><i class="bi bi-search"></i></button>
                                            </form>
                                            <button type="button" class="btn btn-primary mb-2 tombolTambah" data-bs-toggle="modal" data-bs-target="#formModal">
                                                <i class="bi bi-bag-plus-fill"></i> Tambah Data Product
                                            </button>
                                        </div>


                                        <!-- table hover -->
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>No</th>
                                                        <th>Nama Product</th>
                                                        <th>Deskripsi</th>
                                                        <th>Gambar</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if(isset($_POST['cari'])){
                                                        $keyword = $_POST['keyword'];
                                                        $sql = "SELECT * FROM tb_product WHERE nama_product LIKE '%$keyword%' OR deskripsi_product LIKE '%$keyword%' ";
                                                        $query = mysqli_query($db, $sql);
                                                        $nomor = 1;
                                                        while ($data = mysqli_fetch_array($query)){
                                                            echo'<tr>';
                                                            echo'<td></td>';
                                                            echo'<td>'.$nomor++.'</td>';
                                                            echo'<td>'.$data['nama_product'].'</td>';
                                                            echo'<td>'.$data['deskripsi_product'].'</td>';
                                                            echo'<td><img src="images/produk/'.$data['gambar'].'"'.'width="60" alt=""></td>';
                                                            echo'<td>'.$data['created_at'].'</td>';
                                                            echo'<td>'. $data['update_at'].'</td>';
                                                            echo '<td>';
                                                                echo '<a class="btn btn-success mb-2" href="edit.php?id_product='.$data['id_product'].'"><i class="bi bi-pencil-square"></i> Edit</a>';
                                                                echo '<a class="btn btn-danger mb-2 remove" href="delete.php?id_product='.$data['id_product'].'"><i class="bi bi-trash"></i> Hapus</a>';
                                                            echo '</td>';
                                                        echo '</tr>';
                                                        }
                                                    }else{
                                                    $sql = "SELECT * FROM tb_product";
                                                    $query = mysqli_query($db, $sql);
                                                    $nomor = 1;
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?= $nomor++ ?></td>
                                                            <td><?= $data['nama_product'] ?></td>
                                                            <td><?= $data['deskripsi_product'] ?></td>
                                                            <td> <img src="images/produk/<?= $data['gambar'] ?>" width="60" alt=""> </td>
                                                            <td><?= $data['created_at'] ?></td>
                                                            <td><?= $data['update_at'] ?></td>
                                                            <td>
                                                                <a class="btn btn-success mb-2" href="edit.php?id_product=<?php echo $data['id_product']; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                                                                <a class="btn btn-danger mb-2 remove" href="delete.php?id_product=<?php echo $data['id_product']; ?>"><i class="bi bi-trash"></i> Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal -->
                        <div class="modal fade" id="formModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="judulModal">Tambah Data Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="" method="post" enctype="multipart/form-data">

                                            <div class="mb-3">
                                                <label for="nama_product" class="form-label">Nama Product</label>
                                                <input type="text" class="form-control" id="nama_product" name="nama_product" required="required" autocomplete="off">
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi_product" required="required" autocomplete="off">
                                            </div>

                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar" required="required" autocomplete="off">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="Submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal detail -->


                    </section>
                    <!-- Hoverable rows end -->
                </div>
            </div>
            <script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/main.js"></script>
</body>

<script type="text/javascript">
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");


        if (confirm('Yakin ingin menghapus produk ini?')) {
            $.ajax({
                url: '/delete.php',
                type: 'GET',
                data: {
                    id_product: id_product
                },
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#" + id).remove();
                    alert("Record removed successfully");
                }
            });
        }
    });
</script>

</html>
<?php


// Check If form submitted, insert form data into users table.
if (isset($_POST['Submit'])) {
    $nama_product = $_POST['nama_product'];
    $deskripsi_product = $_POST['deskripsi_product'];
    date_default_timezone_set('Asia/jakarta');
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:');
    $ekstensi_diperbolehkan    = array('png', 'jpg');
    $nama = $_FILES['gambar']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'images/produk/' . $nama);
            $query = mysqli_query($db, "INSERT INTO tb_product(nama_product,deskripsi_product,gambar,created_at,update_at) VALUES('$nama_product','$deskripsi_product','$nama','$created_at','$updated_at')");
            header("location: kelola_product.php");
            echo "<script>alert('Data Berhasil Disimpan');window.location='kelola_product.php';</script>";
            die();
        }
    }
}


?>