<?php
session_start();
include 'connection.php';

if(isset($_SESSION['user_name'])) {

    header("Location:students.php");
}

else
{
    $error_message='';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user_name = $_POST['username'];
        $password  = $_POST['password'];
        $status    = 'Active';

        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            $query  = "select *from user where user_name='$user_name'limit 1";
            $result = mysqli_query($con, $query);


            if ($result) {
                if ($result && mysqli_num_rows($result) > 0) {

                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['password'] == $password && $user_data['status'] == $status ) {

                        $_SESSION['user_name'] = $user_data['user_name'];

                        header("Location:students.php");
                        die;

                    }
                }
            }
                $error_message="wrong username or password!";

        } else {
            $error_message='Please fill the form first';
        }
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" >
    <link href="css/custom.css" type="text/css" rel="stylesheet" >
</head>
<body class="text-center">

<main class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <?php if(!empty($error_message)){ ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
        <?php } ?>
        <div class="form-floating">
            <input type="text" class="form-control" name="username" placeholder="name@example.com">
            <label for="floatingInput">User Name</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password"  placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
</main>
</body>
</html>

