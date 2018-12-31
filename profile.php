<?php
    session_start(); 
    if(!isset($_SESSION['user_id'])){
        echo "<script>window.open('signin.html','_self')</script>";
    }
    else{
    include "includes/user.php";
    $user_id=$_GET['uid'];
    $user=new User($user_id);
    $resume=$user->getResume();
    foreach($resume['skills'] as $skill){
       echo $skill['skill_name'];
   }
}
?>
