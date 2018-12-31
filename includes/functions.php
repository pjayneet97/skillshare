<?php     
    function getallusers($orderbyexp="none"){
        include "db.php";
        $sql = "select user_id,user_fname,user_lname,user_profileimg,experience,user_city from user";
        if($orderbyexp == 'asc'){
          $sql=$sql." ORDER BY experience";
        }
        if($orderbyexp=='desc'){
           $sql=$sql." ORDER BY experience DESC";
        }
        $result = mysqli_query($conn,$sql);
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
    function displayusercard($user){
        # write html for single user home page card
        echo $user['user_fname'].' '.$user['user_lname'].'<a href='.'profile.php?uid='.$user['user_id'].'>view</a>';
    }
    function searchusers($key,$orderbyexp="none"){
        include "db.php";
        $sql = "select DISTINCT user_id,user_fname,user_lname,user_profileimg,experience,user_city from user NATURAL JOIN skills NATURAL JOIN work_experience NATURAL JOIN school NATURAL JOIN graduation where user_fname='$key' OR user_lname='$key' OR user_email='$key' OR user_city='$key' OR user_phone='$key' OR skill_name='$key' OR school_name='$key' OR college_name='$key' OR organisation='$key' OR position='$key'";
        if($orderbyexp == 'asc'){
            $sql=$sql." ORDER BY experience";
          }
          if($orderbyexp=='desc'){
             $sql=$sql." ORDER BY experience DESC";
          }
        $result = mysqli_query($conn,$sql);
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
?>