<?php
require_once 'connection.php';

if(isset($_POST['deletesend'])) {

    $deleteid=$_POST['deletesend'];

    $sql="delete from student where id='$deleteid'";
    $result=mysqli_query($con, $sql);
}