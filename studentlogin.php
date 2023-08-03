<?php

include "studentdb.php";
if(isset($_POST['EMAIL'])&& isset($_POST['PASSWD']))
{
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;

    }
}
$EMAIL=validate($_POST['EMAIL']);
$PASSWD=validate($_POST['PASSWD']);

if(empty($EMAIL)){
    header( "refresh:1;url=stulogin.html" );
    echo "EMAIL IS NOT EMPTY";
    exit();

}
else if(empty($PASSWD)){
    header( "refresh:1;url=stulogin.html" );
    echo "PASSWORD IS NOT EMPTY";
    exit();
}
$sql="SELECT *FROM assignment WHERE EMAIL='$EMAIL' And PASSWD='$PASSWD' ";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_assoc($result);
    if($row['EMAIL']===$EMAIL && $row['PASSWD']===$PASSWD){
        echo "logged in";
        $_SESSION["EMAIL"]=$row["EMAIL"];
        $_SESSION["PASSWD"]=$row["PASSWD"];
        header("location:info.html");
        exit();
    }
     else{
        header("refresh:1;url=stulogin.html" );
        echo "SOMETHING WENT WRONG";
        exit();
    }
    
}

else{
    header( "refresh:1;url=stulogin.html" );
    echo "EMAIL AND PASSWORD IS WRONG";
    exit();
}



