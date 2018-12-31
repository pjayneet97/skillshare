<?php
class User {
    var $user_id;
    var $conn;
    function User($user_id){
        include "db.php";
        $this->user_id=$user_id;
        $this->conn = $conn;
    }
    function getskills(){
        $sql = "select * from skills where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        $array=null;
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $array[]=$row;
            }
            return $array;
        } else {
            return $array;
        }
    }
    function getexperience(){
        $sql = "select * from work_experience where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        $array=null;
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $array[]=$row;
            }
            return $array;
        } else {
            return $array;
        }
    }
    function getschool(){
        $sql = "select * from school where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        $array=null;
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $array[]=$row;
            }
            return $array;
        } else {
            return $array;
        }
    }
    function getgraduation(){
        $sql = "select * from graduation where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        $array=null;
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $array[]=$row;
            }
            return $array;
        } else {
            return $array;
        }
    }
    function getpersonal(){
        $sql = "select user_name,user_email,user_phone,user_profileimg,user_city from user where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        $array=null;
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $array[]=$row;
            }
            return $array;
        } else {
            return $array;
        }
    }
    function getResume(){
        $skills=$this->getskills();
        $experience=$this->getexperience();
        $school=$this->getschool();
        $graduation=$this->getgraduation();
        $personal=$this->getpersonal();
        $resume['skills']=$skills;
        $resume['experience']=$experience;
        $resume['school']=$school;
        $resume['graduation']=$graduation;
        $resume['personal']=$personal;
        return $resume;
        // demo to use resume array : echo $resume['skills'][0]['skill_name'];
    }

    function changepassword($new,$current){
        // write code here
    }

    function addSkill($skill){
        // code to add skill
    }

    function addExperience($exp){
        // code to add exp
    }
    function addSchool($school){
        // code to add school
    }
    function addGraduation($graduation){
        // code to add graduation
    }
    function delSkill($skill_id){
        // code to add skill
    }
    function delExperience($experience_id){
        // code to add skill
    }
    function delSchool($school_id){
        // code to add skill
    }
    function delgraduation($skill_id){
        // code to add skill
    }


}
?>