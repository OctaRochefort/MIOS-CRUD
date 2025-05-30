<?php
include 'config/db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM izin WHERE id=$id");
header("Location: index.php");
?>
