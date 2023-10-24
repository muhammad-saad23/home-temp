<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../config.php');

if (isset($_POST['submit'])) {
    $cat_title=$_POST['title'];
    $cat_category=$_POST['category'];
    $cat_status=$_POST['status'];

    $category="SELECT *FROM `product` where title='$cat_title'";
    $run_query=mysqli_query($connection,$category);
    
    if (mysqli_num_rows($run_query) > 0) {
        echo "<script> alert('category already exist'); </script>";
    } 
    else {
        $insert_cat = "INSERT INTO `category` (`id`, `title`, `category`,`status`) VALUES ('$cat_title', '$cat_category', '$cat_type', '$cat_status')";
        $connection_insert = mysqli_query($connection, $insert_cat);
}
}


?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add users</h2>
                <hr>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype='multipart/form-data'>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="category title" name="title" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                        placeholder="category" name="category" required>
                 </div>
            </div>
           
           
               
                <div class="col-sm-6">
                    <input type="submit" class="form-control form-control-user btn btn-success"
                        id="exampleRepeatPassword" placeholder="" name="submit" required>
                </div>
            </div>
           
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