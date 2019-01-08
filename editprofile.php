<?php session_start(); 
    include "includes/user.php";
    $uid=$_SESSION['user_id'];
    $fname=$_SESSION['user_name'];
    $user=new User($uid);
    $resume=$user->getResume();
?>

<!-- <form action="includes/account.php" method='post'>
    <input type="password" name="new" placeholder="new password" required>
    <input type="password" name="current" placeholder="current password" required>
    <button type="submit">Change password</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="skill_name" placeholder="skill name" required>
    <input type="text" name="skill_level" placeholder="level" required>
    <button type="submit">Add Skill</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="school_name" placeholder="school name" required>
    <input type="text" name="school_board" placeholder="board" required>
    <input type="text" name="school_percentage" placeholder="percentage" required>
    <button type="submit">Save</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="college_name" placeholder="college name" required>
    <input type="text" name="degree_name" placeholder="degree" required>
    <input type="text" name="subject" placeholder="subject of study" required>
    <input type="text" name="year_of_completion" placeholder="year of completion" required>
    <button type="submit">Save</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="organisation" placeholder="organisation name" required>
    <input type="text" name="position" placeholder="position" required>
    <input type="text" name="duration" placeholder="duration" required>
    <input type="text" name="description" placeholder="description" required>
    <button type="submit">Save</button>
</form> -->


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

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
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
                                 <div>  <img src='assets/profileimages/".$personal['user_profileimg']."'  class='rounded-circle' alt='Forest' width='200px' height='200px'>
                                  </div>
                                  <form action='includes/account.php' method='post' enctype='multipart/form-data'>
                                        
                                        <div class='fileUpload btn btn-sm btn-primary'>
                                        <span>Upload</span>
                                        <input class='upload' type='file' name='fileToUpload' id='uploadBtn'>
                                        </div>
                                        
                                        <input class='btn btn-primary btn-sm' type='submit' value='change' name='submitfile'>
                                  </form>
                                  <hr>              
                                 <div class='row mx-auto'>
                                     <i class='material-icons' style='color:rgb(5, 126, 116)'>account_box </i>   <span class='mx-auto font-weight-bold'>".$personal['user_fname']." ".$personal['user_lname']." </span>
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
                <div class="col-lg-9 col-sm-9 col-md-auto">
                   <i class="material-icons" style="color:rgb(5, 126, 116)">edit</i> <small class=" font-weight-bold"> Graduation details:</small>
                </div>  
                <div class="col-lg-3 col-sm-3 col-md-auto">
                    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addgraduation">Add </button>
                </div>                            <hr> 
                        <?php 
                            if($resume['graduation']){
                                foreach($resume['graduation'] as $graduation){
                                    echo "<div><a href='includes/account.php?graduation_id=".$graduation['graduation_id']."' class='btn btn-outline-primary float-right'>delete</a><p> <span class='font-weight-bold'> Degree:</span> <span> ".$graduation['degree_name']." <span> ".$graduation['subject']." </span> </span></p>
                                    <p> <span class='font-weight-bold'> College : </span><span>".$graduation['college_name']."</span> </p>
                                    <p> <span class='font-weight-bold'> Year of Completion : </span> <span>".$graduation['year_of_completion']."</span></p> </div>
                                    ";
                                }
                            }
                        ?>
                        </div>
                        <hr>
                    <div class="row mx-auto">
                    <div class="col-lg-9 col-sm-auto col-md-auto">
                               <i class="material-icons" style="color:rgb(5, 126, 116)">edit</i> <small class=" font-weight-bold"> Higher Secondary:</small>
                            </div>  
                        <div class="col-lg-3 col-sm-auto col-md-auto text-right">
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addschool">Add </button>
                        </div>    
                            <?php 
                                if($resume['school']){
                                    foreach($resume['school'] as $school){
                                        echo "<hr> <hr><div><a href='includes/account.php?school_id=".$school['school_id']."' class='btn btn-outline-primary float-right'>delete</a><p> <span class='font-weight-bold'> Subject : </span> <span>PCM</span> </p>
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
                  <div class="row" >
                       <div class="col-lg-8 col-sm-8 col-md-8">
                            <h5 class="card-title font-weight-bold">Work Experience : </h5>
                       </div>  
                       <div class="col-lg-4 col-sm-4 col-md-4 text-right">
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addExperience">Add experience</button>
                       </div>                   
                     </div> 
                      <hr>
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
                                        <a href='includes/account.php?experience_id=".$experience['experience_id']."' class='btn btn-outline-primary float-right'>delete</a>
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
                    <div class="row" >
                                    <div class="col-lg-8 col-sm-8 col-sm-8">
                                         <h5 class="card-title font-weight-bold">Skills : </h5>
                                    </div>  
                                    <div class="col-lg-4 col-sm-4 col-md-4 text-right">
                                       <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#addSkill">Add skill</button>
                                    </div>                   
                                  </div>  
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
                                            <a href='includes/account.php?skill_id=".$skill['skill_id']."' class='btn btn-outline-primary float-right'>delete</a>
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
                <br>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#password">Change Password</button>
          </div>
      </div>
</div>


     </div>
</div>


      <!-- Modal for experience -->
      <div class="modal fade" id="addExperience" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Experience</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form  action="includes/account.php" method="post">
            <div class="modal-body">
     
            <input type="text" name="position" class="form-control mt-2" id="validationTooltip01" placeholder="Position"  required>
  
     
            <input type="text" name="organisation" class="form-control mt-2" id="validationTooltip01" placeholder="organisation"  required>
  
     
            <input type="text" name="duration" class="form-control mt-2" id="validationTooltip01" placeholder="duration(in years)"  required>      
  
     
            <input type="text" name="description" class="form-control mt-2" id="validationTooltip01" placeholder="Description"  required>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>
        </div>
      </div>



       <!-- Modal for skill -->
       <div class="modal fade" id="addSkill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Skill</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form  action="includes/account.php" method="post">
                <div class="modal-body ">
                   
        
                <input type="text" name="skill_name" class="form-control"  id="validationTooltip01" placeholder="skill name"  required>
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose level :</label>
                <select name="skill_level" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option name="skill_level" value="Beginner">Beginner</option>
                  <option name="skill_level" value="Medium">Medium</option>
                  <option name="skill_level" value="Large">Large</option>
                </select>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          
      <!-- Modal for graduation -->
      <div class="modal fade" id="addgraduation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add graduation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="includes/account.php" method="post">
                <div class="modal-body ">
                   
        
                <input type="text"  name="degree_name"  class="form-control mt-2" id="validationTooltip01" placeholder="Degree"  required>
  
      
                <input type="text"  name="subject"  class="form-control mt-2" id="validationTooltip01" placeholder="Subject"  required>
       
        
                <input type="text"  name="year_of_completion" class="form-control mt-2" id="validationTooltip01" placeholder="Year of completion"  required>      
       
        
                <input type="text"  name="college_name" class="form-control mt-2" id="validationTooltip01" placeholder="College name"  required>
       
    
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>


      <!-- Modal for school-->
      <div class="modal fade" id="addschool" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Add Experience</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="includes/account.php" method="post">
                <div class="modal-body ">
                   
        
                <input type="text" name=""  class="form-control mt-2" id="validationTooltip01" placeholder="Subject"  required>
         
        
                <input type="text" name="school_name" class="form-control mt-2" id="validationTooltip01" placeholder="School"  required>
         
        
                <input type="text" name="school_year" class="form-control mt-2" id="validationTooltip01" placeholder="Year of passing"  required>      
         
        
                <input type="text" name="school_board" class="form-control mt-2"id="validationTooltip01" placeholder="Board"  required>
         
        
            <input type="text" name="school_percentage" class="form-control mt-2"  id="validationTooltip01" placeholder="Percentage"  required>
     
       
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>


       <!-- Modal for password -->
       <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Add Skill</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="includes/account.php" method="post">
            <div class="modal-body ">
               
    
            <input type="password" name="current" class="form-control mt-2" id="validationTooltip01" placeholder="current password"  required>
            <input type="password" name="new" class="form-control mt-2" id="validationTooltip01" placeholder="new password"  required>
          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
          </div>
        </div>
      </div>
             
             

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

