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
</form>

