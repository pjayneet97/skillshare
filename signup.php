<?php require "includes/db.php"; 
      session_start();
if(isset($_POST['email']))
{    
$email=$_POST['email'];
$SELECT_query="SELECT user_email FROM user";
$SELECT_query_result=mysqli_query($conn,$SELECT_query) OR die(mysqli_error($conn));
while($row=mysqli_fetch_array($SELECT_query_result)){   
	if($row['user_email']==$email)
	{    
                echo "<script>alert('You are already registered.')</script>";
                echo "<script>window.open('signin.html','_self')</script>";
                exit();
	}	
}
$password=$_POST['password'];
/* function to encrypt password will come here */
$name=$_POST['name'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$query="INSERT INTO `user` (`user_name`, `user_email`, `user_phone`, `user_password`, `user_city`) VALUES ('$name', '$email', '$phone', '$password', '$city')";
if(mysqli_query($conn,$query)){                         
        $_SESSION['user_name']="$name";
        $query2="select * FROM user where user_email='$email'";
        $run=mysqli_query($conn,$query2);
        while($row=mysqli_fetch_array($run)){
              $uid=$row['user_id'];
              $_SESSION['user_id']=$uid;            
        }        
        echo "<script>window.open('editprofile.php','_self')</script>";
}}
?>