<?php
session_start();
session_destroy();
header('location:signin-up.php');
?>