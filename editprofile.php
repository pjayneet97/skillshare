<?php session_start(); 
    include "includes/user.php";
    $uid=$_SESSION['user_id'];
    $name=$_SESSION['user_name'];
    echo $uid.$name;
    $user=new User($uid);
    $resume=$user->getResume();
    if($resume['skills']){
        foreach($resume['skills'] as $skill){
            echo $skill['skill_name'];
            echo "<a href='includes/account.php?skill_id=".$skill['skill_id']."'".">delete</a>";
        }
    }
    if($resume['experience']){
        foreach($resume['experience'] as $experience){
            echo $experience['organisation'];
            echo "<a href='includes/account.php?experience_id=".$experience['experience_id']."'".">delete</a>";
        }
    }
    if($resume['school']){
        foreach ($resume['school'] as $school) {
            echo $school['school_name'];
            echo "<a href='includes/account.php?school_id=".$school['school_id']."'".">delete</a>";
        }
    }
    if($resume['graduation']){
        foreach ($resume['graduation'] as $graduation) {
            echo $graduation['college_name'];
            echo "<a href='includes/account.php?graduation_id=".$graduation['graduation_id']."'".">delete</a>";
        }
    }

?>

<form action="includes/account.php" method='post'>
    <input type="text" name="new" required>
    <input type="text" name="current" required>
    <button type="submit">Change password</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="skill_name">
    <input type="text" name="skill_level">
    <button type="submit">Add Skill</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="school_name">
    <input type="text" name="school_board">
    <input type="text" name="school_percentage">
    <button type="submit">Save</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="college_name">
    <input type="text" name="degree_name">
    <input type="text" name="subject">
    <input type="text" name="year_of_completion">
    <button type="submit">Save</button>
</form>
<form action="includes/account.php" method="post">
    <input type="text" name="organisation">
    <input type="text" name="position">
    <input type="text" name="duration">
    <input type="text" name="description">
    <button type="submit">Save</button>
</form>

