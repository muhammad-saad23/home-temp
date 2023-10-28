<?php

include("config.php");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$result=mysqli_query($connection,"INSERT INTO `user`(`name`,`email`,`password`)values('$name','$email','$password')");

if ($result) {
    echo "resgister successfull";

}
else {
    echo "query failed";
}

?>