<?php
// include database connection file
include "../koneksi.php";
 
// Get id from URL to delete that user
$id_kategori = $_GET['id_kategori'];
 
// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
