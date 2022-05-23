<?php
$status;
$kategori = '';
include "../koneksi.php";
if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];
    $barang = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");

    while ($data_barang = mysqli_fetch_array($barang)) {
        $kode_barang = $data_barang['kode_barang'];
        $nama_barang = $data_barang['nama'];
        $stok = $data_barang['stok'];
        $harga = $data_barang['harga'];
        $kategori = $data_barang['id_kategori'];
    }

    $status = "Edit Data";
    if (isset($_POST['kode_barang'])) {
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $kategori = $_POST['id_kategori'];

        $result = mysqli_query($koneksi, "UPDATE barang SET nama='$nama_barang',stok='$stok',harga='$harga',id_kategori='$kategori' WHERE kode_barang='$kode_barang'");

        header("Location: index.php");
    }
} else {
    $status = "Tambah Data";
    if (isset($_POST['kode_barang'])) {
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $kategori = $_POST['id_kategori'];

        $result = mysqli_query($koneksi, "INSERT INTO barang VALUES('$kode_barang','$nama_barang','$stok','$harga','$kategori')");
    }
}
$kategorii = mysqli_query($koneksi, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Tambah Barang</title>

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
            <a href="index.php" class="navbar-brand"><img src="../assets/images/brand/icon.svg" alt="BigBucket" />
                <strong>Bagus</strong> Subagja</a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Tambah Barang</li>
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
                            <div class="header">
                                <h2>Tambah Barang</h2>
                            </div>
                            <div class="body">
                                <form method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="ID" aria-label="id" aria-describedby="basic-addon1" value="<?= isset($kode_barang) ? $kode_barang : "" ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama" aria-label="nama" aria-describedby="basic-addon1" value="<?= isset($nama_barang) ? $nama_barang : "" ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" aria-label="stok" aria-describedby="basic-addon1" value="<?= isset($stok) ? $stok : "" ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" aria-label="harga" aria-describedby="basic-addon1" value="<?= isset($harga) ? $harga : "" ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Kategori Barang</label>
                                        <select class="form-select" aria-label="Default select example" name="id_kategori">

                                            <option selected hidden>Pilih Kategori</option>
                                            <?php
                                            while ($list_kategori = mysqli_fetch_array($kategorii)) {
                                                echo "<option value='" . $list_kategori['id_kategori'] . "' ", $list_kategori['id_kategori'] == $kategori ? 'selected' : '', ">" . $list_kategori['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
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