<?php
session_start();
$_SESSION['admin']=false;
$_SESSION['faculty']=false;
$_SESSION['student']=false;
session_destroy();
header('Location: homepage.html');
?>