<?php
    include "includes/user.php";
    $user_id=$_GET['uid'];
    $user=new User($user_id);
    $resume=$user->getResume();
    foreach($resume['skills'] as $skill){
       echo $skill['skill_name'];
   }
?>
