<?php  
ob_start();
session_start();
  include "connection.php";

  ?>
<!DOCTYPE html>
<html>
    <head>
       <title>KO.CHAT</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <link type="text/css" href="style1.css?v=<?php echo time(); ?>" rel="stylesheet">
        <link type="text/css" href="responssive.css?v=<?php echo time(); ?>" rel="stylesheet">
    </head>
    <body>
    <section class="section-login">
        <h1>ko.<span class="chat-edit">chat</span></h1>
        <?php 
        
        global $login_error;
        if(isset($_POST['log_in_submit'])){
$email=clean($_POST['email']);
$password=clean($_POST['password']);
if($email==""){
$errors[]="email faild cannot be empty.";
}
if($password==""){
    $errors[]="password faild cannot be empty.";
    }
        
        if(empty($errors)){
            if(login_user($email,$password)){
                
                $sql="SELECT first_name ,last_name,department,stage,type,email,id FROM user where email='".$email."'";
                $result = query($sql);
                if(mysqli_num_rows($result)>0){

                    $row=fetch_array($result);
                    $_SESSION['id']=$row['id'];
                    $_SESSION['first_name']=$row['first_name'];
                    $_SESSION['last_name']=$row['last_name'];
                    $_SESSION['department']=$row['department'];
                    $_SESSION['stage']=$row['stage'];
                    $_SESSION['type']=$row['type'];
                    $_SESSION['active']=$row['active'];
                    $_SESSION['email']=$row['email'];
                }
                redirect('home.php');
            }else{
                $login_error=true;
            }
        }
    }
        ?>
        <div class="log-content">


        <?php if (!empty($errors)){      ?> <div><p class="error_log_in"><?php foreach($errors as $error){
        echo $error."<br>";
    } ?>  </p></div>  <?php }   
       
        
     ?>
     <?php if($login_error) { ?><div><p class="error_log_in">wrong email or password.</p></div> <?php }?>
    <?php 
    function login_user($email,$password){
        $sql="SELECT password,id FROM user WHERE email='".escape($email)."'";
        $result=query($sql);
        if(row_count($result)){
            $row=fetch_array($result);
            $db_password=$row['password'];
            if(md5($password)===$db_password){
                query("UPDATE user set active='1' WHERE email='".$email."'");
                
                return true;
            }
            else{
                return false;
            }
        }
    } 
    ?>
           <form class="login-form" method="post">
            <input type="email" placeholder="E-mail" class="email" name="email">
            <input type="password" placeholder="Password" class="password" name="password">
               <a href="#"><input type="submit" name="log_in_submit" value="Log-in" class="log-btn"></a>
               <a href="#poppap" ><input type="button" value="Register" class="log-btn"> </a>
            </form>
        </div>
    </section>





    <div class="poppap" id="poppap">
       <div class="register-form">
           <a href="#" class="poppap-close">&times;</a>
           <div class="reg-back-img">
               <h1>Sign <span class="chat-edit">up</span></h1>
           </div>
         <div class="reg-form">
         <?php 
         $errors=[];
         $min=3;
         $max=20;
         $email_max=40;
         global $r;
         
if(isset($_POST['regester_submit'])){
    $r=true;
  $first_name=clean($_POST['first_name']);
    $last_name=clean($_POST['last_name']);
    $email=clean($_POST['email']);
    $department=$_POST['departments'];
    $stage=$_POST['stage'];
    $password=clean($_POST['password']);
    if($department=='departments_defulte'){
        $r=true;
        $errors[]= 'please select your department.&&';
    }
    if($stage=='satge_defulte'){
        $r=true;
        $errors[]= 'please select your stage.&&';
    }
if(strlen($first_name)<$min){
    $r=false;
    $errors[]= 'first name shoud graeter than '.$min.' charechters.&&';
}
if(strlen($first_name)>$max){
    $r=false;
    $errors[]= 'first name shoud less than '.$max.' charechters.&&';
}
if(strlen($last_name)<$min){
    $r=false;
    $errors[]= 'last name shoud graeter than '.$min.' charechters.&&';
}
if(strlen($last_name)>$max){
    $r=false;
    $errors[]= 'last name shoud less than '.$max.' charechters.&&';
}
if(email_exists($email)){
    $r=false;
    $errors[]= 'this email already exists.&&';
}
if(strlen($email)>$email_max){
    $r=false;
    $errors[]= 'email shoud less than '.$email_max.' charechters.&&';
}
if($_POST['password']!==$_POST['confirm_password']){
    $r=false;
    $errors[]= 'your password failds do not much.&&';
}

    }


    function email_exists($email){
        $s=false;
$sql="SELECT id FROM yadag WHERE email='$email'";
global $connection;
$result= mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    $s= true;
}
$sql="SELECT id FROM user WHERE email='$email'";
global $connection;
$result= mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    $s= true;
}
return $s;
    }
    function register_user($first_name,$last_name,$email,$password,$department,$stage){
    
        if(email_exists($email)){
            return false;
             
        }else{
            $password =md5($password);
            $sql ="INSERT INTO yadag(first_name,last_name,email,password,department,stage)";
            $sql.=" VALUES('$first_name','$last_name','$email','$password','$department','$stage')";
            $result=query($sql);
            confirm($result);
            if(!$result){
                die (mysqli_error());
            }
            return true;
         }
    }     
?>
<?php if (!empty($errors)){      ?> <div><p class="error"><?php foreach($errors as $error){
        echo $error;
    } ?> </p></div>  <?php }   else{
        if($r){
            register_user($first_name,$last_name,$email,$password,$department,$stage);
       redirect("waiting.php");
        }
    }  ?>
         
               <form class="frm" id="frm" action="" method="post">
                              <input type="text" placeholder="First-Name" class="first-name" id="first-name" name="first_name" required>
            <input type="text" placeholder="Last-Name" class="last-name" id="last-name" name="last_name" required>
            <input type="email" placeholder="E-mail Address" class="reg-email" id="email" name="email" required>
            <input type="password" placeholder="Enter-your-Password" class="reg-password" id="password" name="password" required>
            <input type="password" placeholder="Confirm-Password" class="confirm-password" id="confirm-password" name="confirm_password" required>
        
        
                <h3 class="p-form">Departments :</h3>
               <select class="departments" id="departments" name="departments">
               <option  value="departments_defulte" id="departments_defulte">---select your Departments---</option>
                   <option  value="Civil" id="Civil">Department of Civil Engineering</option>
                   <option  value="Geotechnical">Department of Geotechnical Engineering</option>
                   <option value="Architectural">Department of Architectural Engineering</option>
                   <option  value="Petroleum">Department of Petroleum Engineering</option>
                   <option  value="Chemical">Department of Chemical Engineering</option>
                   <option  value="Manufacturing">Department of Manufacturing Engineering</option>
                   <option  value="Software">Department of Software Engineering</option>
        
               </select>
                   
            
            <h3 class="p-form">stage :</h3>
                            
                           <select class="stage" name="stage">
                           <option  value="satge_defulte" id="satge_defulte" >---select your Stage---</option>
                               <option  value="1" id="1" name="stage_1">1</option>
                               <option value="2" id="2" name="stage_2">2</option>
                               <option value="3" id="3" name="stage_3">3</option>
                               <option value="4" id="4" name="stage_4">4</option>
                               <option value="5" id="5" name="stage_5">5</option>
                               
                           </select><br>
                           
                          
                        <input type="submit" class="reg-btn" value="register now!" name="regester_submit" id="reg-btn" onclick="reg()" >
                        </form>
                    </div>
       </div>
    
    </div>
    
    <script src="jquery-3.5.1.min.js"></script>
    <script src="javascrept.js"></script>
    </body>
</html>
<?php 

?>