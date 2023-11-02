<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('../config.php');

// display products

$limit = 3;
if (isset($_GET['pgno'])) {
    $pgno = $_GET['pgno'];
} else {
    $pgno = 1;
}
$start = ($pgno - 1) * $limit; //select *from product limit 0.3s

$select = "SELECT *FROM `product` as p inner join `category` as c on p.category = c.id order by category desc limit {$start},{$limit}";

$run_query = mysqli_query($connection, $select);

if (mysqli_num_rows($run_query) > 0) {

    // search


    ?>




    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Registerd users</h2>
                <hr>
                <table class="table table-warning">
                    <thead class="bg-warning p-2 text-dark bg-opacity-10" style="opacity: 75%;">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tab">
                        <?php

                        while ($data = mysqli_fetch_assoc($run_query)) {

                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $data['id'] ?>
                                </th>
                                <td>
                                    <?php echo $data['title'] ?>
                                </td>
                                <td>
                                    <?php echo $data['category'] ?>
                                </td>
                                <td>
                                    <?php echo $data['des'] ?>
                                </td>
                                <td><img src="<?php echo 'image/' . $data['image'] ?>" width='100px' height='100px' alt=""></td>
                                
                                <td><a class='btn btn-success' href="updateData.php?id=<?php echo $data['id'] ?>">update</a></td>
                                <td><a class='btn btn-danger' href="delete.php?id=<?php echo $data['id'] ?>">delete</a></td>

                            </tr>

                            <?php
                        }
}
?>
                </tbody>
            </table>

            <?php
            $pagination = "SELECT * FROM `product`";
            $res = mysqli_query($connection, $pagination);
            if (mysqli_num_rows($res) > 0) {
                $total_record = mysqli_num_rows($res);
                // $limit = 3;
                $total_pages = ceil($total_record / $limit);

                echo '<ul class="pagination">';
                if ($pgno > 1) {
                    echo '<li class="page-item"><a class="page-link" href="showproduct.php?pgno=' . ($pgno - 1) . '">prev</a></li>';

                }
                for ($i = 1; $i < $total_pages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="showproduct.php?pgno=' . $i . '">' . $i . '</a></li>';
                }
                if ($pgno < $total_pages) {
                    echo '<li class="page-item"><a class="page-link" href="showproduct.php?pgno=' . ($pgno + 1) . '">next</a></li>';

                }
                echo '</ul>';
            }


            ?>



        </div>

    </div>

</div>

<!-- ajax cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        let query = $('#input');
        let table= $('#tab');
        console.log(table);
        query.on('keyup', function () {
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {
                    input: query.val()
                },
                success: function(data) {
                    console.log(data)   
                    table.html(data)

                }
            })
        })
    })
</script>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>