<?php 
include "connection.php";
$w=false;
?>
<!DOCTYPE html>
<html>
    <head>
       <title>KO.CHAT</title>
        <style>
          body{
            overflow: hidden;
font-size: 20px;
    color: #fff;
     font-weight: 300;
    font-family: 'Lato',sans-serif;
    text-rendering: optimizeLegibility;
       background-image:linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url(reg-img-2.jpg);
    background-position:bottom;
    background-size: cover;
    height: 100vh;
         
  }
.info{
  padding:100px;
  width: 100%;
    height: 90vh;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%) scale(0.25);
    background-color: rgb(236, 239, 241,0.5);
    border-radius: 5px;
    padding-right: 10px;
    box-shadow: 0 2rem 4rem rgba(0, 0, 0, 0.2);
font-size:200%;
text-align:center;
color:#333;
}
.back{
  cursor: pointer;
    border-radius: 50px;
    text-transform: uppercase;
    background-color:  rgba(230, 126, 34, 0.8);
    border: 0;
    outline: none;
    cursor: pointer;
    transition: background-color 0.2s;
    font-size:200%;
    margin-top:100px;

}
.-back:active,
.back:hover{
background-color: rgb(34, 29, 29);
color: rgba(230, 126, 34, 0.8);
}
        </style>
    </head>
    <body>
    <div class="info"><h2>Your registration is completed 
Wait until the head of your department approves your registration.
      
    </h2>
   
    </body>
    </html>