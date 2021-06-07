$(document).ready(function(){
    var email=$("#email_accept").val();
    alert(email);
$("#accept").clck(function(){
 $(".addmin_table").load("accept.php",{
      useremail:email
 })
    
})
});

//new change 