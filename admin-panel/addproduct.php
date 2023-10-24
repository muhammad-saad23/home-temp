<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../config.php');

if (isset($_POST['submit'])) {
    $pro_title=$_POST['title'];
    $pro_cat=$_POST['category'];
    $pro_des=$_POST['des'];
    $img_name=$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $img_size=$_FILES['image']['size'];

    move_uploaded_file($tmp_name,'image/'.$img_name);

    $insert="INSERT INTO `product`(`title`,`category`,`des`,`image`) 
    values('$pro_title','$pro_cat','$pro_des','$img_name')";
    $run_query=mysqli_query($connection,$insert);
}


?>


    <div class="container">

    <?php
    if (isset($_POST['btn-category'])) {
        $category=$_POST['addcategory'];
        $insert_cat="INSERT INTO `category`(`name`) values('$category')";
        $conn_cat=mysqli_query($connection,$insert_cat);
    }
    ?>
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <form action='<?php echo $_SERVER['PHP_SELF'];?>' method='POST'>
                <h2>Add category</h2>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="add category" name="addcategory" required>
                </div>
                <div class="col-sm-6">
                 <input type="submit" class="form-control form-control-user btn btn-success" id="exampleFirstName"
                        placeholder="product category" name="btn-category" required>
                 </div>
                 </div>
            </form>
            <hr>
            <h2>Add products</h2>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="product title" name="title" required>
                </div>
                <div class="col-sm-6">
               <select class="form-select" name='category' aria-label="Default select example">
                   echo '<option selected '>Open this select menu</option>
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
            <!-- <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user
                        id="exampleRepeatPassword" placeholder="product category" name="category" required>
                </div> -->
            
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
            <!-- <a class="btn btn-primary btn-user btn-block" name="register">
                Register Account
            </a> -->
            <!-- <input type="submit" class="btn btn-primary btn-user btn-block" name="register" > -->
            <hr>
            
                                
        </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>