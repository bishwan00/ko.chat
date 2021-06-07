<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link type="text/css" href="style2.css?v=<?php echo time(); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
</head>
<body>


<?php 
session_start();
include "connection.php";
             $useremail=$_POST['useremail'];
             $sql="SELECT * FROM yadag WHERE email='".$useremail."'";
             $result=mysqli_query($connection,$sql);
             if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $first_name=$row['first_name'];
                $last_name=$row['last_name'];
                $email=$row['email'];
                $password=$row['password'];
                $department=$row['department'];
                $stage=$row['stage'];
            
            }
                 
             $sql ="INSERT INTO user(first_name,last_name,email,password,department,stage)";
             $sql.=" VALUES('$first_name','$last_name','$email','$password','$department','$stage')";
             $result=query($sql);
             if(!$result){
                die (mysqli_error());
            }
           
   
$sql="DELETE FROM yadag WHERE email='".$useremail."'";
$result=query($sql);
if(!$result){
   die (mysqli_error());
}
?>
<table class="addmin_table">
            <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>E-mail</th>
                          <th>Accept</th>
                          <th>Decline</th>
                      </tr>
                      <?php
             $sql="SELECT * FROM yadag WHERE department='".$_SESSION['department']."'";
             $result=mysqli_query($connection,$sql);

             if(mysqli_num_rows($result)>0){
                
                 while ($row=mysqli_fetch_assoc($result)){
                     ?>
                  
                 <tr>
                     <td><?php echo $row['first_name']; ?></td>
                     <td><?php echo $row['last_name'] ; ?></td>
                     <td id="email_accept"><?php echo $row['email'] ; ?></td>
                     <td> <button id="accept" onclick=accept();><i  class="ion-checkmark-round"></i></button></td>
                     <td><button id="decline" onclick=decline();> <i  class="ion-close-round"></i></button></td>
                 </tr>
<?php
                 }
             }
           
           ?>
           </table>
            </body>
           <script src="jquery-3.5.1.min.js"></script>
  