<?php 
    session_start(); 
    if(!isset($_SESSION['user_id'])){
        echo "<script>window.open('signin.html','_self')</script>";
    }
    else{
    $fname=$_SESSION['user_name']; 
    $uid=$_SESSION['user_id']; 
    include "includes/functions.php";
    if(isset($_GET['key'])){
        $href="index.php?key=".$_GET['key']."&orderbyexp=";
    }
    else{
        $href="index.php?orderbyexp=";
    }
    if($_GET){
        if(isset($_GET['key']) && isset($_GET['orderbyexp'])){
                $key=$_GET['key'];
                $orderbyexp=$_GET['orderbyexp'];
                $users=searchusers($key,$orderbyexp);
        }    
        else if (isset($_GET['key']) && !isset($_GET['orderbyexp'])){
                $key=$_GET['key'];
                $users=searchusers($key);
            }
        else if (!isset($_GET['key']) && isset($_GET['orderbyexp'])){
            $orderbyexp=$_GET['orderbyexp'];
            $users=getallusers($orderbyexp);
        }
    }
    else{
        $users=getallusers();
    }
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
    <title>SkillShare</title>
  </head>
  <body>
        <header>
                <nav class="shadow navbar navbar-expand-md navbar-dark fixed-top bg-dark" >
                  <a class="navbar-brand" style="color:white" href="index.php">Skillshare</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="d-sm-none d-md-block mx-auto mt-2 mt-md-0"> <form class="form-inline" action="index.php" >
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
       <div class="shadow card mt-2">
         <div class="card-body">
           <h5 class="card-title">Top Searches</h5>
           <ul class="card-text"><?php getTopSearches(); ?></ul>
         </div>
       </div>
     </div>
   
     <div class="col-lg-9 col-sm-auto col-md-auto">
           <div class="card mt-2">
               <div class="card-body">
                  <div class="row mx-auto ">
                      
                      <div class="col-lg-7 col-sm-10 col-md-10">
                         Resume
                        </div> 

                        <div class="col-lg-5 col-sm-2 col-md-2">
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Sort by experience
                                </button>
                               <div class="dropdown-menu">
                                   <a class="dropdown-item" href="<?php echo $href.'asc'; ?>">low to high</a>
                                   <a class="dropdown-item" href="<?php echo $href.'desc'; ?>">high to low</a>
                               </div>
                            </div>
                            <a style="text-decoration:none" href="index.php"><button class="btn btn-sm btn-outline-dark">Reset filters</button></a>
                       </div>


                   </div>
                 </div>
          </div>
       <div class="row">
            <?php 
                if($users){
                    foreach ($users as $user) {
                    displayusercard($user);
                    }
                }
            ?>
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
    