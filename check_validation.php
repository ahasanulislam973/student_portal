<?php
require_once 'connection.php';
session_start();
if(isset($_SESSION['user_name'])) {

    $flag = 1;
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['mobile'] ?? "";
    $status = $_POST['status'] ?? "";
    $address = $_POST['address'] ?? "";


    if (strlen($name) < 4) {
        echo "Inter valid name";
        exit;
    } else {
        $flag = 1;
    }

    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
        echo "Enter a valid Email" . "<br>";
        exit;
    } else {
        $flag = 1;
    }

    if (strlen($phone) == 13 || strlen($phone) == 11) {
        $tenDigitPhone = substr($phone, '-10'); // last 10 digit of a inputed phone number

        $FirstTwoDigit = substr($tenDigitPhone, 0, 2);//first 2 digit of 10 digit phone number

        $operateorCodeArray = array("17", "18", "19", "13", "14", "15");//array for BD operator code

        if (in_array($FirstTwoDigit, $operateorCodeArray)) { //search BD phone number from array
            $flag = 1;
        } else {
            echo "Not a valid number";
            exit;
        }
    } else {
        echo "Invalid Phone number" . "<br>";
        exit;
    }

    if ($flag == 1) {

        $sql = "INSERT INTO student(name,mobile,email,address,status)
    VALUES('$name','$phone','$email','$address','$status')";
        if (mysqli_query($con, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    }
}

else{
    header("Location:index.php");
}
?>
