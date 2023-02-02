<?php
require_once 'connection.php';
session_start();
if (isset($_SESSION['user_name'])) {

    if (isset($_POST['displaysend'])) {
        ?>
        <!DOCTYPE html>
        <html>

        <body>



        </body>
        </html>
        <?php
    }
} else {
    header("Location:index.php");
}
?>


