<?php
session_start();
include 'connection.php';
$email=$_POST['email'];
$sql="SELECT * FROM user WHERE email='".$email."'";
$result=mysqli_query($connection,$sql);
if(mysqli_num_rows($result)>0){
   $row=mysqli_fetch_assoc($result);
   $first_name=$row['first_name'];
   $last_name=$row['last_name'];
   $email=$row['email'];
   $password=$row['password'];
   $department=$row['department'];
   $stage=$row['stage'];
   $_SESSION['income_id']=$row['id'];

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
$sql="SELECT * FROM message WHERE (income_id='".$_SESSION['income_id']."'||income_id='".$_SESSION['id']."') && (outgo_id='".$_SESSION['id']."'||outgo_id='".$_SESSION['income_id']."')";
$result=mysqli_query($connection,$sql);
if(!$result){
    die (mysqli_error());
 }

?>

<div class="header">
    <div class="content">
        <img class="frind_img" src="user.jpg">
        <div class="details">
        <span class="frind_name"><?php echo $first_name." ".$last_name ?></span>
       
    </div>
    </div>
</div> 

<div class="chat_box" id="chat_box">

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


</div>
<form id="typing_area" action="#" class="typing_area">
    <input type="text" class="text_message" placeholder="Type a message here...">
    <button id="send_message"><i class="ion-android-send"></i></button>
</form> 
<?php

?>
<script src="jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
   setInterval(() => {
    $(".chat_box").load("show_new_message.php",{
      
    })
   }, 1000);
   $("#send_message").click(function(){
    var q=1;
$("#typing_area").submit(function(){
var message=$(".text_message").val();

if(q==1){
$.post("./message.php",{
   message:message
  
})
q=0;
}
   $(".chat_box").load("show_new_message.php",{
      
 })
});

});
});
</script>
</body>