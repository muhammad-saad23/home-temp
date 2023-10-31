<?php
include("../config.php");
include("admin/includes/topbar.php");

$input=$_POST['input'];

$select="SELECT *from `product` where title like %$input%";
$run=mysqli_query($connection,$select);

if ($run) {
   if (mysqli_num_rows($run)>0) {
    while ($data=mysqli_fetch_assoc($run)) {
        '<tr>
        <th scope="row">
            <?php echo'. $data['id'].' ?>
        </th>
        <td>
            <?php echo'. $data['title'].' ?>
        </td>
        <td>
            <?php echo '.$data['name'].' ?>
        </td>
        <td>
            <?php echo '.$data['des'].' ?>
        </td>
        <td><img src="'. 'image/' . $data['image'].'" width='100px' height='100px' alt=""></td>
        <td>
            <?php echo'. $data['status'].' ?>
        </td>
        <td><a class='btn btn-success' href="updateData.php?id=<?php echo' .$data['id'].' ?>">update</a></td>
        <td><a class='btn btn-danger' href="delete.php?id=<?php echo '.$data['id'].' ?>">delete</a></td>

    </tr>'
    }
   }
}

?>