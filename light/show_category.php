<?php
include "../koneksi.php";
// $result = mysqli_query($koneksi, "SELECT * FROM kategori where id_kategori = '" . $_GET['id_kategori'] . "'");
$result = mysqli_query($koneksi, "SELECT * FROM kategori");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Lihat Kategori</title>

    <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/css/main.css" type="text/css">
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="../assets/images/brand/icon_black.svg" width="48" height="48" alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="index.html" class="navbar-brand"><img src="../assets/images/brand/icon.svg" alt="BigBucket" />
                <strong>Big</strong> Bucket</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Lihat Kategori</li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">

        <div class="left_sidebar">
            <nav class="sidebar">
                <div class="user-info">
                    <div class="image"><a href="index.php"><img src="../assets/images/user.png" alt="User"></a></div>
                    <div class="detail mt-3">
                        <h5 class="mb-0">Bagus Subagja</h5>
                        <small>2008315</small>
                    </div>
                    <div class="social">
                        <a href="https://github.com/bagussubagja" title="Github"><i class="ti-github"></i></a>
                        <a href="https://www.linkedin.com/in/bagussubagja/" title="Linkedin"><i class="ti-linkedin"></i></a>
                        <a href="https://www.instagram.com/bagussubagjaa/" title="Instagram"><i class="ti-instagram"></i></a>
                    </div>
                </div>
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Main</li>
                    <li><a href="index.php"><i class="ti-home"></i><span>Dashboard</span></a></li>
                    <li class="g_heading">Add Data</li>
                    <li><a href="add_inventory.php"><i class="ti-pencil-alt"></i><span>Tambah Data Barang</span></a></li>
                    <li><a href="add_category.php"><i class="ti-pencil-alt"></i><span>Tambah Kategori</span></a></li>
                    <li><a href="add_orders.php"><i class="ti-pencil-alt"></i><span>Tambah Order</span></a></li>
                    <li class="g_heading">Show Data</li>
                    <li><a href="show_inventory.php"><i class="ti-menu-alt"></i><span>Lihat Data Barang</span></a></li>
                    <li><a href="show_category.php"><i class="ti-menu-alt"></i><span>Lihat Kategori</span></a></li>
                    <li><a href="show_orders.php"><i class="ti-menu-alt"></i><span>Lihat Order</span></a></li>
                </ul>
            </nav>
        </div>



        <div class="page">

            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card planned_task">

                            <div class="body">
                                <h4>Data Kategori</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0 c_list">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                </th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($data_kategori = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $data_kategori['id_kategori'] . "</td>";
                                                echo "<td>" . $data_kategori['nama'] . "</td>";
                                                echo "<td> <a href='add_category.php?id_kategori=" . $data_kategori['id_kategori'] . " '>Edit</a> | <a href='delete_category.php?id_kategori=" . $data_kategori['id_kategori'] . "'>Delete</a></td>";
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/js/theme.js"></script>
</body>

</html>