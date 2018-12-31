<?php 
session_start(); 
session_destroy();
echo "<script>window.open('signin.html','_self')</script>";
?>