<?php
include("config.php");

if (isset($_POST['submit'])) {
    $pro_id=$_POST['id'];
    $pro_title=$_POST['title'];
    $pro_category=$_POST['category'];
    $pro_des=$_POST['description'];
    $pro_image=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $image_size=$_FILES['image']['size'];

    move_uploaded_file($tmp_name,'image/'.$pro_image);
    $updatequery="UPDATE `product` set `title`='$pro_title',`category`='$pro_category',`description`='$pro_des',`image` = '$pro_image' where id='$pro_id' ";
    $run_update=mysqli_query($connection,$updatequery);

}
// $product_id=$_GET['id'];

// if (isset($_GET['id'])) {

//     $select="SELECT *from `product` as p join `category` as c on p.category=c.id where p.id='$product_id'";
//     $run_select=mysqli_query($connection,$select);

//     if (mysqli_num_rows($run_select)>0) {
//         # code...
//     }
// }
?>