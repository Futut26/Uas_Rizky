<?php 
include 'koneksi.php';
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}?>
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
                        <li class="sidebar-item active">
                            <a href="dashboard.phpch" class='sidebar-link'>
                                <i class="bi bi-shop"></i>
                                <span>Product</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
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
                                <h3>Product</h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    <section class="section" id="form-and-scrolling-components">
                        <div class="row row-cols-1  row-cols-md-4 g-5">
                        <?php
                            $sql = "SELECT * FROM tb_product";
                            $query = mysqli_query($db, $sql);
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <div class="col col-sm-6">
                                <div class="card style="width: 18rem;"">
                                    <img src="images/produk/<?= $data['gambar']?>" width="50" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $data['nama_product']?></h5>
                                        <p class="card-text"><?= $data['deskripsi_product']?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <!-- Hoverable rows end -->
                </div>
            </div>
            <script src="vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script src="js/main.js"></script>
</body>

</html>