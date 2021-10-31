<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'devbytesregistration');

$name = $_POST['username'];
$password = $_POST['password'];


$s = " select * from usertable where name = '$name' && password ='$password'" ; 

$results = mysqli_query($con, $s);

$num = mysqli_num_rows($results);


if($num == 1)
{
    $_SESSION['username'] = $name;
   header('location:index.php');
}

else if(empty($name)){
header("location:login.php?error=username is required");
}
else if(empty($password)){
    header("location:login.php?error=password is required");
    }
  
else{
    header('location:login.php?error=username and password did not match');

}


?>
