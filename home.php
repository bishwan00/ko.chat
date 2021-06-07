<?php  
ob_start();
session_start();
  include "connection.php";

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
    <section class="all">
<div class="header">
    <h1>ko.<span class="chat-edit">chat</span></h1>

<?php
$type='visible';
if($_SESSION['type']==='1'){
    $type='visible';
}
else{
    $type='hidden';
}

?>


    <a href="#poppap"><button class="addmin" id="addmin" style="visibility:<?php echo $type; ?>;">addmin</button></a>
    <select class="groups">
        <option>Engineering Departments</option>
        <option>Software Engineering</option>
        <option>stage three</option>
        

    </select>
    <input type="text" placeholder="Search" class="search_box">
    <div class="user_info">
    <p>
        <a href="#" class="pro_link">
        <img src="user.jpg" class="pro_img">
        <span class="name"><?php echo $_SESSION['first_name'] ;?></span>
    </a>
    </p>
    <a href="log_out.php"><button class="log_out">Log out</button></a>
</div>
</div>


<div class="frind">
<input type="text" class="frind_search" placeholder="Search for your frinds">

    
        <?php 
        if($_SESSION['type']==1){
            $sql="SELECT * FROM user WHERE (type='1' ||department='".$_SESSION['department']."')&&email!='".$_SESSION['email']."'";
            $result=mysqli_query($connection,$sql);
        }else{
             $department=$_SESSION['department'];
             $sql="SELECT * FROM user WHERE (type='0' ||first_name='".$department."')&&email!='".$_SESSION['email']."'";
             $result=mysqli_query($connection,$sql);
        }
             if(mysqli_num_rows($result)>0){
                
                while ($row=mysqli_fetch_assoc($result)){
                    
                ?>
                 <?php $get_frind_name_by_email=$row['email'];?>
                <a href="#" id="<?php echo $get_frind_name_by_email;?>" onclick="load_message(this)">
                   <div class="content">
    <img class="frind_img" src="user.jpg">
    <div class="details">
   
    <span class="frind_name" > <?php echo $row['first_name'];?></span><span class="frind_name"> <?php echo $row['last_name'];?></span>
    <p class="rseve_massege"><?php echo $row['department'];?></p>
</div>
</div>
<?php 

if($row['active']==="1"){
    ?>
    <div class="status_dot" style="color:green;"><i class="ion-record"></i></div>
    <?php
}
else{
    ?>
    <div class="status_dot" style="color:orange;"><i class="ion-record"></i></div>
    <?php
}
                
?>


</a>
               
               <?php 
                }
             }
        
        ?>


</div>
<div class="chat">






    </div>
    
</section>
<div class="poppap" id="poppap">
       <div class="addmin_accept">
           <a href="#" class="poppap-close">&times;</a>
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
                        <td ><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name'] ; ?></td>
                        <td id="email_accept"><?php echo $row['email'] ; ?></td>
                        <td> <button class="accept" onclick=accept();><i  class="ion-checkmark-round"></i></button></td>
                        <td><button class="decline" onclick=decline();> <i  class="ion-close-round"></i></button></td>
                    </tr>
<?php
                    }
                }
              
              ?>
        
          </table>
       </div>
    
    </div>
    <script src="jquery-3.5.1.min.js"></script>
    <script>
    
function load_message(element){
    
    var email = element.id;
        
    $(".chat").load("showMessage.php",{
      email:email
 })

}



        function accept(){
    email=$("#email_accept").text();
   
 $(".addmin_table").load("accept.php",{
      useremail:email
 })
    
};
function decline(){
   
    email=$("#email_accept").text();
   
 $(".addmin_table").load("decline.php",{
      useremail:email
 })
    

};

    
$(document).ready(function(){
   
    var email=$("#email_accept").text();
    function refresh()
    {
        var div = $('#status_dot'),
            divHtml = div.html();

        div.html(divHtml);
    }

    setInterval(function()
    {
        refresh();
    }, 10000);


});

    </script>
</body>
</html>