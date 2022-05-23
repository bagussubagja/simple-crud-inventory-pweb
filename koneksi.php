<?php
$koneksi = mysqli_connect("localhost", "root", "");
mysqli_select_db($koneksi, "penjualan") or die("Koneksi tidak ditemukan");
