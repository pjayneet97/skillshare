<?php require "includes/db.php"; 
      session_start();
?>
<?php
    if(isset($_POST['email'])){        
        $email=$_POST['email'];
        $password=$_POST['password'];
        /* function to encrypt password come here */        
        $query="SELECT * FROM `user` WHERE `user_email`='$email' and `user_password`='$password'";
        $run=mysqli_query($conn,$query);
        $num=mysqli_num_rows($run);
        if($num==0){
            echo "<script>alert('Password Or Email is incorrect')</script>";
            echo "<script>window.open('signin.html','_self')</script>";
        }
        else{
            $row=mysqli_fetch_array($run);            
            $name=$row['user_name'];  
            $uid=$row['user_id'];          
            $_SESSION['user_name']=$name;
            $_SESSION['user_id']=$uid;                     
            echo "<script>window.open('index.php','_self')</script>";
        }        
    }
?>