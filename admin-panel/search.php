<?php
include("../config.php");
// include("admin/includes/topbar.php");

$input=$_POST['input'];

$select="SELECT * from `product` where `title` like '%$input%'";
$run=mysqli_query($connection,$select);



if ($run) {
   if (mysqli_num_rows($run)>0) {
    while ($data = mysqli_fetch_assoc($run)) {
        echo '<tr>
        <th scope="row">
            <?php '.$data['id'].' ?>'.$data['id'].'
        </th>
        <td>
            <?php '.$data['title'].' ?>'.$data['title'].'
        </td>
        <td>
            <?php '.$data['category'].' ?>'.$data['category'].'
        </td>
        
        <td>
            <?php  '.$data['des'].' ?>'.$data['des'].'
        </td>
        <td><img src="'. 'image/' . $data['image'].'" width="100px" height="100px" alt=""></td>
        
        <td><a class="btn btn-success" href="updateData.php?id=<?php echo' .$data['id'].' ?>">update</a></td>
        <td><a class="btn btn-danger" href="delete.php?id=<?php echo '.$data['id'].' ?>">delete</a></td>

    </tr>';
    }

   }
}

?>