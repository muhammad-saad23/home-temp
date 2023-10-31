<?php
include("config.php");

$input=$_POST['input'];


$result=mysqli_query($connection,"SELECT *FROM `user` where `name` like '%$input%' ");

if ($result) {
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            echo '<tr>
            <th scope="row">'.$data['id'].'</th>
            <td>'.$data['name'].'</td>
            <td>'.$data['email'].'</td>
            <td>'.$data['password'].'</td>
            </tr>';
        }  
    }
}

?>