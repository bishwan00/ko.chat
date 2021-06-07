<?php
 
 $connection=mysqli_connect('localhost','root','','project');

if(!$connection){
    die ('not connected'.mysql_error());
}
function row_count($result){
    return mysqli_num_rows($result);
}
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}
function query($query){
    global $connection;
    return mysqli_query($connection,$query);
}
function fetch_array($result){
    global $connection;
    return mysqli_fetch_array($result);
}
function confirm($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }

}
function clean($string){
return htmlentities($string);
}
function redirect($location){
    return header("location: {$location}");
}
                   ?>