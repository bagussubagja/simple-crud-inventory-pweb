<?php
// include database connection file
include "../koneksi.php";

// Get id from URL to delete that user
$id_order = $_GET['id_order'];

// Delete user row from table based on given id
$result = mysqli_query($koneksi, "DELETE FROM orders WHERE id_order='$id_order'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
