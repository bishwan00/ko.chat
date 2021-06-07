<?php
session_start();
include 'connection.php';

$sql="SELECT * FROM message WHERE (income_id='".$_SESSION['income_id']."'||income_id='".$_SESSION['id']."') && (outgo_id='".$_SESSION['id']."'||outgo_id='".$_SESSION['income_id']."')";
$result=mysqli_query($connection,$sql);
if(!$result){
    die (mysqli_error());
 }

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link type="text/css" href="style2.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link type="text/css" href="responsive_home.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
</head>
<body>
<?php 
 if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)){
    
        if($row['outgo_id']==$_SESSION['id']){
        ?>

<div class="chatt outgoing">
    <div class="details">
        <p><?php echo $row['message_text']; ?></p>
    </div>
</div>
<?php
        }
        elseif($row['outgo_id']==$_SESSION['income_id']){
?>
<div class="chatt incoming">
    <img src="user.jpg">
    <div class="details">
        <p><?php echo $row['message_text']; ?></p>
    </div>
</div>
<?php
        }
    }
 }
?>