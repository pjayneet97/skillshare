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
        echo "<div class='col-lg-3'>
        <div class='shadow card mt-2'>
            <div class='container ' style='text-align:center' >
              <br>
              <img class='rounded-circle mb-2' src='assets/profileimages/".$user['user_profileimg']."' class='rounded' alt='Forest' width='150px' height='150px'>
              <p style='margin-bottom:-6px;'><strong>".$user['user_fname']." ".$user['user_lname']."</strong></p>
              <small>".$user['experience']." yr experience</small>
              <p>".$user['user_city']."</p>
              <a style='text-decoration:none' href='profile.php?uid=".$user['user_id']."'><button class='btn btn-block btn-primary'>View Resume</button></a>
            </div>
   </div>
     </div>";
    }
    function searchusers($key,$orderbyexp="none"){
       # echo $key;
        include "db.php";
        // code to update searches table for recommending top searches
        {
            $query="select * from searchs where key_name='$key'";
            $run=mysqli_query($conn,$query);
            if($run){
                if(mysqli_num_rows($run)>0){
                    // increment count
                    while($row=mysqli_fetch_array($run)){
                        $count=$row['count'];
                        $count = $count+1;
                        $id=$row['key_id'];
                        $queryincr="update searchs set count = count+1 where key_id='$id'";
                        mysqli_query($conn,$queryincr);
                    }
                    
                }
            
            else{
                $query="INSERT INTO `searchs`(`key_name`, `count`) VALUES ('$key','1')";
                mysqli_query($conn,$query);
            }
        }
        }
        $sql = "select DISTINCT user.user_id,user_fname,user_lname,user_profileimg,experience,user_city from user LEFT JOIN skills ON user.user_id = skills.user_id LEFT JOIN work_experience ON user.user_id = work_experience.user_id LEFT JOIN school ON user.user_id = school.user_id LEFT JOIN graduation ON user.user_id = graduation.user_id where user_fname='$key' OR user_lname='$key' OR user_email='$key' OR user_city='$key' OR user_phone='$key' OR skill_name='$key' OR school_name='$key' OR college_name='$key' OR organisation='$key' OR position='$key'";
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

    function getTopSearches(){
        include "db.php";
        $sql="select key_name FROM searchs ORDER BY count DESC LIMIT 5";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_array($result)){
                $key=$row['key_name'];
                echo "<li><a href='index.php?key=".$key."'>".$key."</a></li>";
                
            }
        }
    }
?>