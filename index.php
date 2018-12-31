<?php 
    session_start(); 
    if(!isset($_SESSION['user_id'])){
        echo "<script>window.open('signin.html','_self')</script>";
    }
    else{
    $name=$_SESSION['user_name']; 
    $uid=$_SESSION['user_id']; 
    echo $name.$uid;
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
<form action="index.php" method="get">
    <input type="text" name="key" required>
    <button type="submit">search</button>
</form>
    <a href="<?php echo $href.'desc'; ?>">desc</a>
    <a href="<?php echo $href.'asc'; ?>">asc</a>

    <a href="editprofile.php">edit profile</a>  
    <a href="logout.php">logout</a>

<?php      
    
if($users){
    foreach ($users as $user) {
    displayusercard($user);
    }
}

}
?>
    