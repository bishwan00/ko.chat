<?php
ob_start();
session_start();
include 'connection.php';

mysqli_query($connection,"UPDATE user set active='0' WHERE email='".$_SESSION['email']."'");
session_destroy();
redirect('index.php');


?>
