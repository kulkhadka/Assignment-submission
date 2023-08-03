<?php 

$sname="localhost";
$EMAIL="root";
$PASSWD="";
$db_name="test";
$conn=mysqli_connect($sname,$EMAIL,$PASSWD,$db_name);

if(!$conn){
    echo "connection failed";
}
?>