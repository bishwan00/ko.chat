<?php 
ob_start();
session_start();
include 'connection.php';
$message=$_POST['message'];
$my_message=$_SESSION['id'];
$income_id=$_SESSION['income_id'];
$sql ="INSERT INTO message(message_text,outgo_id,income_id)";
$sql.=" VALUES('$message','$my_message','$income_id')";
$result=query($sql);
if(!$result){
   die (mysqli_error());
}
?>