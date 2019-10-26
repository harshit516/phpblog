<?php

$host='localhost';
$username='id11356128_root';
$password='9892665907';
$databasename='id11356128_phpblog';

//create connection
$conn=mysqli_connect($host,$username,$password,$databasename);
//check connection

if(mysqli_connect_errno()){
    //connection failed
    echo'connection failed'.mysqli_connect_errno();
}
?>