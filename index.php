<form action="index.php" method="get">
    <input type="text" name="key">
    <button type="submit">search</button>
</form>
<form action="index.php">
    <select name="orderbyexp">
        <option value="none" selected>no sorting</option>
        <option value="desc">more to less</option>
        <option value="asc">less to more</option>
    </select>
    <button type="submit">sort</button>
</form>
<?php
    include "includes/functions.php";
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
    