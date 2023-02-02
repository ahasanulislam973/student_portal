<?php
require_once 'connection.php';
$responseArr=[];
$id=$_POST['updateid'] ?? "";

$sql="select * from student where id='$id'";
$result=mysqli_query($con,$sql);

while($rows=mysqli_fetch_assoc($result)) {
    $responseArr=$rows;

}

echo json_encode($responseArr);

if(isset($_POST['hiddendata']))
{
    $uniqueid=$_POST['hiddendata'];
    $updatename=$_POST['updatename'];
    $updatemobile=$_POST['updatemobile'];
    $updateemail=$_POST['updateemail'];
    $updatestatus=$_POST['updatestatus'];
    $updateaddress=$_POST['updateaddress'];


    $sql = "UPDATE student SET name='$updatename',mobile='$updatemobile',email='$updateemail',address='$updateaddress',status='$updatestatus' WHERE id= '$uniqueid'";

    if (mysqli_query($con, $sql)) {
        echo "Update successfully";
    } else {
        echo "Do not update";
    }
    mysqli_close($con);
}

?>