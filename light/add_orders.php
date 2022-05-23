<?php
include "../koneksi.php";
$barang = mysqli_query($koneksi, "SELECT * FROM barang");
$jml_data = mysqli_query($koneksi, "SELECT COUNT(id_order) FROM orders");
$jml_data = mysqli_fetch_array($jml_data);
$total = 0;
$id;
if (isset($_POST['kode_barang'])) {
    $tanggal = date("Y-m-d");
    $inputorder = mysqli_query($koneksi, "INSERT INTO orders VALUES(NULL,'$tanggal','Selesai','0')");

    $id = mysqli_query($koneksi, "SELECT id_order FROM orders ORDER BY id_order DESC");
    $id = mysqli_fetch_array($id);

    $kode_barang = $_POST['kode_barang'];
    $quantity = $_POST['quantity'];

    foreach ($kode_barang as $key => $n) {

        $harga = mysqli_query($koneksi, "SELECT harga FROM barang WHERE kode_barang = '$n'");
        $harga = mysqli_fetch_array($harga);

        $total += $harga[0] * $quantity[$key];

        $inputdetail = mysqli_query($koneksi, "INSERT INTO detail_order(quantity,id_order,id_barang) VALUES('$quantity[$key]','$id[0]','$n')");
    }

    $updatetotal = mysqli_query($koneksi, "UPDATE orders SET total='$total' WHERE id_order='$id[0]'");
    header("Location:index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Tambah Order</title>

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
                            <li class="breadcrumb-item active">Tambah Order</li>
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
                                <h2>Tambah Order</h2>
                            </div>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="Barang" class="form-label">Barang : </label>
                                    <select class="form-select" aria-label="Default select example" name="kode_barang[]" id="dropdown">
                                        <option selected hidden>Pilih Barang</option>
                                        <?php
                                        while ($data_barang = mysqli_fetch_array($barang)) {
                                            echo "<option value='" . $data_barang['kode_barang'] . "'>" . $data_barang['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Kuantitas Barang</label>
                                    <input type="text" class="form-control" id="harga" name="quantity[]">
                                </div>
                                <p id="GFG_DOWN"></p>
                                <h2 class="btn btn-success" onClick="GFG_Fun()">Tambah Barang</h2><br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <script>
        var down = document.getElementById("GFG_DOWN");
        var first = document.getElementById('dropdown');
        var options = first.innerHTML;

        var br = document.createElement("br");

        function GFG_Fun() {

            var SL = document.createElement("select");
            SL.setAttribute("class", "form-select");
            SL.setAttribute("name", "kode_barang[]");
            SL.innerHTML = options;

            var QTY = document.createElement("input");
            QTY.setAttribute("type", "text");
            QTY.setAttribute("name", "quantity[]");
            QTY.setAttribute("class", "form-control");
            QTY.setAttribute("placeholder", "Kuantitas")

            down.appendChild(SL);

            down.appendChild(br.cloneNode());

            down.appendChild(QTY);
            down.appendChild(br.cloneNode());
        }
    </script>
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <script src="../assets/js/theme.js"></script>
</body>

</html>