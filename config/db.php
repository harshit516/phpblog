<?php



//create connection
$conn=mysqli_connect($host,$username,$password,$databasename);
//check connection

if(mysqli_connect_errno()){
    //connection failed
    echo'connection failed'.mysqli_connect_errno();
}
?>
