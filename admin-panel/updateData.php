<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../config.php');

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






if (isset($_GET['submit'])) 
$pro_id = $_GET['id'];

$select="SELECT *from `product` as p join `category` as c on p.category=c.id where p.id='$pro_id'";
$run_select=mysqli_query($connection,$select);

if (mysqli_num_rows($run_select)>0) {
    while ($row=mysqli_fetch_assoc($run_select)) {
        
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">

    <form class="user" action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="product title" name="title" required>
                </div>
                <div class="col-sm-6">
               <select class="form-select" name='category' aria-label="Default select example">
                   <option selected >Open this select menu</option>
                <?php
                $fetch_cat="SELECT*from `category` where status='1'";
                $conn=mysqli_query($connection,$fetch_cat);
                
                if (mysqli_num_rows($conn)>0) {
                    while ($data=mysqli_fetch_assoc($conn)) {
                        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                    }
                }
                
                ?>
              
                
                </select>
            </div>
   
            
            <div class="form-group">
                <textarea type="email" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="product" name="des" required></textarea>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="file" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="add image" name="image" required>
                </div>
                <div class="col-sm-6">
                    <input type="submit" class="form-control form-control-user btn btn-success"
                        id="exampleRepeatPassword" placeholder="" name="submit" required>
                </div>
            </div>

    </div>
</body>
</html>