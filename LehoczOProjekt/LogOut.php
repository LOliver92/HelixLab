<?php
session_start();
session_destroy();
unset($_SESSION['userdata']);
header('location:View/MainPageView.html');
exit();
?>

