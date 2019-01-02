<?php
    session_start(); 
    if(!isset($_SESSION['user_id'])){
        echo "<script>window.open('signin.html','_self')</script>";
    }
    else{
    include "includes/user.php";
    $user_id=$_GET['uid'];
    $fname=$_SESSION['user_name'];
    $uid=$_SESSION['user_id']; 
    $user=new User($user_id);
    $resume=$user->getResume();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    
   <style>
    /* GLOBAL STYLES
-------------------------------------------------- */
/* Padding below the footer and lighter body text */

body {
  padding-top: 3rem;
  padding-bottom: 3rem;
  color: #000000;
  background-color: whitesmoke;
}



</style>
    <title>Hello, world!</title>
  </head>
  <body>
  <header>
                <nav class="shadow navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
                  <a class="navbar-brand" style="color:white" href="index.php">Skillshare</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="d-sm-none d-md-block mx-auto mt-2 mt-md-0"> <form class="form-inline" >
                      <input name="key" required class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" size="80">
                      <button class="btn btn-outline-primary my-2 my-sm-0" style='color: white' type="submit"><i class="material-icons">search</i></button>
                    </form>
                  </div>
                    <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <?php echo $fname;?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="profile.php?uid=<?php echo $uid; ?>">View Resume</a>
                              <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                              <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                          </div>
                  </div>
                </nav>
              </header>
              <br>

  <div class="row mx-auto">
  
    <div class="col-lg-3 col-sm-auto col-md-auto">
       <div class="shadow-sm card mt-2">
         <div class="card-body">
           <h5 class="card-title">Top Searches</h5>
           <p class="card-text">Content</p>
         </div>
       </div>
     </div>
   
     <div class="col-lg-9 col-sm-auto col-md-auto">
           <div>
          <div class="container-fluid">
      <div class="row">
          <div class="col-lg-4 col-sm-auto col-md-auto">
                <?php 
                    if($resume['personal']){
                        foreach($resume['personal'] as $personal){
                            echo "              <div class='card mt-2 shadow p' >
                            <div class='card-body' style='text-align:center'>
                                 <div>  <img src='assets/profileimages/".$personal['user_profileimg']."'  class='rounded-circle' alt='Forest' width='150px' height='150px'>
                                  </div>   <hr>              
                                 <div class='row mx-auto'>
                                     <i class='material-icons' style='color:rgb(5, 126, 116)'>account_box </i>   <span class='mx-auto font-weight-bold'>".$personal['user_fname']." ".$personal['user_fname']." </span>
                                 </div><hr>
                                 <div class='row mx-auto'>
                                  <i class='material-icons' style='color:rgb(16, 16, 70)'>email </i> <span style='font-size:15px' class='mx-auto font-weight-bold'> ".$personal['user_email']." </span>
                              </div><hr>
                              <div class='row mx-auto'>
                                 <i class='material-icons' style='color:rgb(16, 16, 70)'>contact_phone</i> <span class='mx-auto font-weight-bold'>".$personal['user_phone']." </span>
                              </div><hr>
                              <div class='row mx-auto'>
                                <i class='material-icons' style='color:rgb(16, 16, 70)'>location_on</i> <span class='mx-auto font-weight-bold'>".$personal['user_city']." </span>
                              </div><hr>
                          
                           </div>
                        </div>";
                        }
                    }
                ?>
              <div class="card mt-2 shadow p">
                  <div class="card-body">
                      <h5 class="card-title text-center font-weight-bold font-weight-italic"> Education details:</h5><hr>
                      <div class="row mx-auto">
                        <i class="material-icons" style="color:rgb(5, 126, 116)">edit</i> <span class=" font-weight-bold"> Graduation details:</span>
                        <hr> 
                        <?php 
                            if($resume['graduation']){
                                foreach($resume['graduation'] as $graduation){
                                    echo "<div> <p> <span class='font-weight-bold'> Degree:</span> <span> ".$graduation['degree_name']." <span> ".$graduation['subject']." </span> </span></p>
                                    <p> <span class='font-weight-bold'> College : </span><span>".$graduation['college_name']."</span> </p>
                                    <p> <span class='font-weight-bold'> Year of Completion : </span> <span>".$graduation['year_of_completion']."</span></p> </div>
                                    ";
                                }
                            }
                        ?>
                        </div>
                        <hr>
                    <div class="row mx-auto">
                       <div> <i class="material-icons" style="color:rgb(5, 126, 116)">edit</i> <span class=" font-weight-bold"> Higher secondary details:</span> </div>
                            <?php 
                                if($resume['school']){
                                    foreach($resume['school'] as $school){
                                        echo "<hr> <hr><div><p> <span class='font-weight-bold'> Subject : </span> <span>PCM</span> </p>
                                        <p> <span class='font-weight-bold'>School: </span><span>".$school['school_name']." </span></p>
                                        <p> <span class='font-weight-bold'>Year of Passing : </span> <span>2018</span></p> 
                                        <p> <span class='font-weight-bold'> Percentage : </span> <span> ".$school['school_percentage']." %</span></p> 
                                        <p> <span class='font-weight-bold'>Board : </span> <span> ".$school['school_board']."</span></p></div> ";
                                    }
                                }
                            ?>
                    
                    </div><hr>
                  </div>
              </div>
          </div>
          <div class="col-lg-8 col-sm-auto col-md-auto">
              <div class="card mt-2 shadow p">
                  <div class="card-body">
                      <h5 class="card-title font-weight-bold">Work Experience : </h5> 
                      <hr> <h6> <span class="font-weight-bold" > Total (in Years) : </span> <span> 3 years</span> </h6>
                      <p class="card-text ">
                        
                          <div class="row font-weight-bold mx-auto">
                              Details :
                          </div>
                          <br>
                          <?php
                                if($resume['experience']){
                                    foreach($resume['experience'] as $experience){
                                        echo "                          <div class='card mt-2 shadow-sm'>
                                        <div class='card-body'>
                                          <div class='row mx-auto'>
                                              <p><span class='font-weight-bold'> Position : </span> <span> ".$experience['position']." <Span> at <span>".$experience['organisation']." </span></p>
                                          </div>
                                          <div class='row mx-auto'>
                                              <p> <span class='font-weight-bold' > Total (in years) : </span> <span> ".$experience['duration']." year </span></p>
                                          </div>
                                          <div class='row mx-auto'>
                                            <p> <span class='font-weight-bold'> Description :</span> <span> ".$experience['description']."</span></p>
                                        </div>
                                        </div>
                                    </div>";
                                    }
                                }
                            ?>
                      </p>
                  </div>
            </div>

                <div class="card mt-2 shadow p">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"> Skills: </h5> 
                        <p class="card-text ">
                          
                            <div class="row font-weight-bold mx-auto">
                                Details :
                            </div>
                            <br>
                                <?php 
                                    if($resume['skills']){
                                        foreach($resume['skills'] as $skill){
                                            echo "                            <div class='card mt-2 shadow-sm'>
                                            <div class='card-body'>
                                              <div class='row mx-auto'>
                                                  <p> <span class='font-weight-bold'> Skill Name : </span> <span> ".$skill['skill_name']."</span></p>
                                              </div>
                                              <div class='row mx-auto'>
                                                <p> <span class='font-weight-bold'> Level :</span> <span>".$skill['skill_level']."</span></p>
                                            </div>
                                            </div>
                                        </div>";
                                        }
                                    }
                                ?>
                           
                        </p>
                    </div>      
                </div>

          </div>
      </div>
</div>


     </div>
</div>
             
             

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
}
?>
