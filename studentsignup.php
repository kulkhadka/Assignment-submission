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
$course=$_POST['COURSE'];
$email=$_POST['EMAIL'];
$pass=$_POST['PASSWD'];
$pass_con=$_POST['confirm_password'];
//$pass_con=$_POST['confirm_password'];

if(empty(trim($uname))){
    //$firstname_Err="firstname must be filled";
    header( "refresh:1;url=stusignup.html" ); 
    echo "USERNAME IS  NOT EMPTY";
    exit();
}
elseif(empty(trim($number))){
    header( "refresh:1;url=stusignup.html" ); 
    $secondname_Err="NUMBER IS  NOT EMPTY";
    echo "$secondname_Err";
    exit();
}
elseif(empty(trim($course))){
    header( "refresh:1;url=stusignup.html" );
    echo "please enter a course you enroll";
}

elseif(empty(trim($email))){
    header( "refresh:1;url=stusignup.html" ); 
    $email_Err="Email must be filled";
    echo "$email_Err";
    exit();

}







elseif(empty(trim($pass))){
    header( "refresh:1;url=stusignup.html" ); 
    $pass_Err="Password must be filled";
    echo "$pass_Err";
    exit();
}
elseif($pass !== $pass_con){
 header( "refresh:1;url=stusignup.html" ); 
     echo "password and confirm should be  sameo";
     exit(); 
 
 } 
 


/* elseif($pass !== $pass_con){



   header( "refresh:1;url=stusignup.html" ); 
    echo "   password should match";
    exit(); 

} 
*/

else{

$data="INSERT INTO assignment(UNAME,NUMBER,COURSE,EMAIL,PASSWD) values('$uname','$number', '$course','$email','$pass')";
mysqli_query($connection, $data);
header("location:stulogin.html");
}
?>
