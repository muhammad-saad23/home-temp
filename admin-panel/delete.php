<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../config.php');

$user_id=$_GET['id'];
$delete="DELETE from `product` where category='$user_id'";
$del_query=mysqli_query($connection,$delete);

if ($del_query) {
    // echo "deleted";
    // header("location:showproduct.php");
}



?>