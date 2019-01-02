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
        $sql = "select user_fname,user_lname,user_email,user_phone,user_profileimg,user_city,experience from user where user_id='$this->user_id'";
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
        $query1="SELECT * FROM `user` WHERE `user_id`='$this->user_id' and `user_password`='$current'";
        $run=mysqli_query($this->conn,$query1);
        $num=mysqli_num_rows($run);
        if($num==1)
        {   $query2="UPDATE `user` SET `user_password`='$new' WHERE user_id='$this->user_id'";
            $run=mysqli_query($this->conn,$query2);
            if($run)
            {
                return true; 
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    function addSkill($array){
        $skill_name=$array['skill_name'];
        $skill_level=$array['skill_level'];
        $sql = "INSERT INTO `skills`(`user_id`, `skill_name`, `skill_level`) VALUES ('$this->user_id','$skill_name','$skill_level')";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function addExperience($array){
        $organisation=$array['organisation'];
        $position=$array['position'];
        $duration=$array['duration'];
        $description=$array['description'];

        $sql = "INSERT INTO `work_experience`(`user_id`, `organisation`, `position`, `duration`, `description`) VALUES ('$this->user_id','$organisation','$position','$duration','$description')";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function addSchool($array){
        $school_name=$array['school_name'];
        $school_board=$array['school_board'];
        $school_percentage=$array['school_percentage'];

        $sql = "INSERT INTO `school`(`user_id`, `school_name`, `school_board`, `school_percentage`) VALUES ('$this->user_id','$school_name','$school_board','$school_percentage')";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function addGraduation($array){
        $college_name=$array['college_name'];
        $degree_name=$array['degree_name'];
        $subject=$array['subject'];
        $year_of_completion=$array['year_of_completion'];
        $sql = "INSERT INTO `graduation`(`user_id`, `college_name`, `degree_name`, `subject`, `year_of_completion`) VALUES ('$this->user_id','$college_name','$degree_name','$subject','$year_of_completion')";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function delSkill($skill_id){
        $sql = "DELETE FROM `skills` WHERE skill_id='$skill_id'";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function delExperience($experience_id){
        $sql = "DELETE FROM `work_experience` WHERE experience_id='$experience_id'";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function delSchool($school_id){
        $sql = "DELETE FROM `school` WHERE school_id='$school_id'";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function delgraduation($graduation_id){
        $sql = "DELETE FROM `graduation` WHERE graduation_id='$graduation_id'";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateimage($img){
        $sql = "update user set user_profileimg='$img' where user_id='$this->user_id'";
        $result = mysqli_query($this->conn,$sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


}
?>