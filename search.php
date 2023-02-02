<?php
require_once 'connection.php';
if (isset($_POST['namesearch']) && isset($_POST['emailsearch']) && isset($_POST['phonesearch']) && isset($_POST['addresssearch'])) {
    $namesearch=$_POST['namesearch'];
    $emailsearch=$_POST['emailsearch'];
    $phonesearch=$_POST['phonesearch'];
    $addresssearch=$_POST['addresssearch'];

?>
<!DOCTYPE html>
<html>

<body>
<table class="table ">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Serial No</th>
        <th scope="col">Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Status</th>
        <th scope="col">Operations</th>
    </tr>
    </thead>

    <?php
   $sql = "select * from student where name LIKE '%".$namesearch."%' AND email LIKE '%".$emailsearch."%' AND mobile LIKE '%".$phonesearch."%' AND address LIKE '%".$addresssearch."%' ";

    $result = mysqli_query($con, $sql);

    $number = 1;
    while ($rows = mysqli_fetch_assoc($result)) {

        $id = $rows['id'];
        $name = $rows['name'];
        $mobile = $rows['mobile'];
        $email = $rows['email'];
        $address = $rows['address'];
        $status = $rows['status'];
        ?>
        <tr>
            <td scope="row"><?php echo $number; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $mobile; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $status; ?></td>

            <td>
                <button class="btn btn-primary" onclick="updateuser(<?php echo $id; ?>)">Update</button>
                <button class="btn btn-danger" onclick="deleteuser(<?php echo $id; ?>)">Delete</button>
            </td>

        </tr>
        <?php
        $number++;
    }
    ?>

    <?php
    }
    ?>

    <script>




</body>
</html>

