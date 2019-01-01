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
        echo "         <div class='col-lg-3'>
        <div class='shadow card mt-2'>
            <div class='container ' style='text-align:center' >
              <br>
              <img class='rounded-circle mb-2' src='assets/profileimages/".$user['user_profileimg']."' class='rounded' alt='Forest' width='150px' height='150px'>
              <p style='margin-bottom:-6px;'><strong>".$user['user_fname']." ".$user['user_lname']."</strong></p>
              <small>".$user['experience']." yr experience</small>
              <p>".$user['user_city']."</p>
              <p><button class='btn btn-block btn-outline-primary'>View Resume</button></p>
            </div>
   </div>
     </div>";
    }
    function searchusers($key,$orderbyexp="none"){
        echo $key;
        include "db.php";
        $sql = "select DISTINCT user_id,user_fname,user_lname,user_profileimg,experience,user_city from user NATURAL JOIN skills NATURAL JOIN work_experience NATURAL JOIN school NATURAL JOIN graduation where user_fname='$key' OR user_lname='$key' OR user_email='$key' OR user_city='$key' OR user_phone='$key' OR skill_name='$key' OR school_name='$key' OR college_name='$key' OR organisation='$key' OR position='$key'";
        if($orderbyexp == 'asc'){
            $sql=$sql." ORDER BY experience";
          }
          if($orderbyexp=='desc'){
             $sql=$sql." ORDER BY experience DESC";
          }
          echo $sql;
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