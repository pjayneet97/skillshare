<?php
    include "user.php";
    $uid=1;
    $user=new User($uid);
    if(isset($_POST['new']) && isset($_POST['current'])){
        $new=$_POST['new'];
        $current=$_POST['current'];
        $user->changepassword($new,$current);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_POST['skill_name'])){
        $skill['skill_name']=$_POST['skill_name'];
        $skill['skill_level']=$_POST['skill_level'];
        $user->addSkill($skill);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_POST['school_name'])){
        $school['school_name']=$_POST['school_name'];
        $school['school_board']=$_POST['school_board'];
        $school['school_percentage']=$_POST['school_percentage'];
        $user->addSchool($school);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_POST['organisation'])){
        $exp['organisation']=$_POST['organisation'];
        $exp['position']=$_POST['position'];
        $exp['duration']=$_POST['duration'];
        $exp['description']=$_POST['description'];
        $user->addExperience($exp);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_POST['college_name'])){
        $graduation['college_name']=$_POST['college_name'];
        $graduation['degree_name']=$_POST['degree_name'];
        $graduation['subject']=$_POST['subject'];
        $graduation['year_of_completion']=$_POST['year_of_completion'];
        $user->addGraduation($graduation);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    
?>