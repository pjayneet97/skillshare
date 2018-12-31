<?php 
    include "includes/functions.php";
    if(isset($_GET['key'])){
        $href="index.php?key=".$_GET['key']."&orderbyexp=";
    }
    else{
        $href="index.php?orderbyexp=";
    }
?>
<form action="index.php" method="get">
    <input type="text" name="key" required>
    <button type="submit">search</button>
</form>
        <a href="<?php echo $href.'desc'; ?>">desc</a>
        <a href="<?php echo $href.'asc'; ?>">asc</a>

      

<?php
    if($_GET){
        if(isset($_GET['key']) && isset($_GET['orderbyexp'])){
                $key=$_GET['key'];
                $orderbyexp=$_GET['orderbyexp'];
                $users=searchusers($key,$orderbyexp);
                if($users){
                    foreach ($users as $user) {
                    displayusercard($user);
                    }
                }
        }    
        else if (isset($_GET['key']) && !isset($_GET['orderbyexp'])){
                $key=$_GET['key'];
                $users=searchusers($key);
                if($users){
                    foreach ($users as $user) {
                    displayusercard($user);
                    }
                }
            }
        else if (!isset($_GET['key']) && isset($_GET['orderbyexp'])){
            $orderbyexp=$_GET['orderbyexp'];
            $users=getallusers($orderbyexp);
            if($users){
                foreach ($users as $user) {
                displayusercard($user);
                }
            }
        }
    }
    else{
        $users=getallusers();
        if($users){
            foreach ($users as $user) {
            displayusercard($user);
            }
        }
    }
        
        

?>
    