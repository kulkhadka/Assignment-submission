<?php
session_start();
$pass_Err= $email_Err =$uname_Err= $secondname_Err="";
$connection = mysqli_connect('localhost','root');

/*if($connection){
echo "connection is estabilished";
}
else{
echo "connection failed";
}
*/


mysqli_select_db($connection,'test');

$uname=$_POST['UNAME'];
$number=$_POST['NUMBER'];

$email=$_POST['EMAIL'];
$pass=$_POST['PASSWD'];
$depart=$_POST['DEPARTMENT'];
$pass_con=$_POST['confirm_password'];
//$pass_con=$_POST['confirm_password'];

if(empty(trim($uname))){
    //$firstname_Err="firstname must be filled";
    header( "refresh:1;url=teachersignup.html" ); 
    echo "USERNAME IS  NOT EMPTY";
    exit();
}
elseif(empty(trim($number))){
    header( "refresh:1;url=teachersignup.html" ); 
    $secondname_Err="NUMBER IS  NOT EMPTY";
    echo "$secondname_Err";
    exit();
}
elseif(empty(trim($depart))){
    header( "refresh:1;url=teachersignup.html" );
    echo "please enter a department....";
}

elseif(empty(trim($email))){
    header( "refresh:1;url=teachersignup.html" ); 
    $email_Err="Email must be filled";
    echo "$email_Err";
    exit();

}







elseif(empty(trim($pass))){
    header( "refresh:1;url=teachersignup.html" ); 
    $pass_Err="Password must be filled";
    echo "$pass_Err";
    exit();
}
elseif($pass !== $pass_con){
 header( "refresh:1;url=teachersignup.html" ); 
     echo "password and confirm should be  same";
     exit(); 
 
 } 
 


/* elseif($pass !== $pass_con){



   header( "refresh:1;url=stusignup.html" ); 
    echo "   password should match";
    exit(); 

} 
*/

else{

$data="INSERT INTO teacher (UNAME,NUMBER,DEPARTMENT,EMAIL,PASSWD) values('$uname','$number', '$depart','$email','$pass')";
mysqli_query($connection, $data);
header("location:teacherlogin.html");
}
?>
