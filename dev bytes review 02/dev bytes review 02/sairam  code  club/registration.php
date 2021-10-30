<?php

session_start();


$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'devbytesregistration');

$name = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$s = " select * from usertable where name = '$name'"; 

$results = mysqli_query($con, $s);

$num = mysqli_num_rows($results);

if($num == 1)
{
    
    header('location:signin-up.php');
    $_SESSION['userr'] = "username already taken";
}
else if(empty($name)){
    header("location:login.php?error=username is required");
    }
else if(empty($password)){
        header("location:login.php?error=password is required");
        }
else{
    $reg = "insert into usertable (name , password,email) values ('$name' , '$password','$email')";
    mysqli_query($con, $reg);
    $_SESSION['userr'] = "Sign-up sucessful";
    header('location:signin-up.php');
    

}
?>