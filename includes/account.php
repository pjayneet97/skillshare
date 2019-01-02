<?php
    session_start();
    include "user.php";
    $uid=$_SESSION['user_id'];
    $user=new User($uid);
    if(isset($_POST['new']) && isset($_POST['current'])){
        $new=$_POST['new'];
        $current=$_POST['current'];
        $status=$user->changepassword($new,$current);
        if(!$status){
        echo "<script>alert('wrong password')</script>";
        }
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

    if(isset($_GET['skill_id'])){
        $delid=$_GET['skill_id'];
        $user->delSkill($delid);
        echo "hello";
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_GET['experience_id'])){
        $delid=$_GET['experience_id'];
        $user->delExperience($delid);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_GET['graduation_id'])){
        $delid=$_GET['graduation_id'];
        $user->delGraduation($delid);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }
    if(isset($_GET['school_id'])){
        $delid=$_GET['school_id'];
        $user->delSchool($delid);
        echo "<script>window.open('../editprofile.php','_self')</script>";
    }    
?>

<?php
if($_POST['submitfile']){
    $target_dir = "../assets/profileimages/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submitfile"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $img=$_FILES["fileToUpload"]["name"];
        $status=$user->updateimage($img);
        if(!$status){
            echo "hello";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
echo "<script>window.open('../editprofile.php','_self')</script>";
}

?>