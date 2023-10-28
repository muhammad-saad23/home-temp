<?php

include("config.php");

$select="SELECT*from `user`";
$result = mysqli_query($connection, $select);
if($result){
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