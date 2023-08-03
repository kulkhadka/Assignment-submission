<?php 
/*
This file contains database configuration assuming you are
running mysql using user="root" password=""
*/
$sname="localhost";
$EMAIL="root";
$PASSWD="";
$db_name="test";
//try  connecting to the  database 
$conn=mysqli_connect($sname,$EMAIL,$PASSWD,$db_name);

//check the connection
if(!$conn){
    echo "connection failed";
}
?>