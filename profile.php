<?php
    include "includes/user.php";
    $user=new User(1);
    $resume=$user->getResume();
 /* demo use :
    foreach($resume['skills'] as $skill){
       echo $skill['skill_name'];
   }
 */
?>