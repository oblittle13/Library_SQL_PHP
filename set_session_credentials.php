<?php


//    Validate User Credentials
$con = new mysqli("localhost",$_POST["username"],$_POST["password"], "login_info");
if($con->connect_errno){
    echo "$con->connect_errno"; 
    echo "<h3>Invalid username or password!</h3><p><a href=\"index.php\">Try Again</a></p>";
    header("location:index.php?cred=failed&code=$con->connect_errno");
    exit;
}


$username = $_POST["username"];
$password = $_POST["password"]; 

echo "<p>the username is $username and the password is $password</p>";

setcookie("username",$username,time()+3600);
setcookie("password",$password,time()+3600);

header('Location:main.php'); 

?>
