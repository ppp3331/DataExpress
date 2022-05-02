<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
$teamid=$_POST['teamid'];
$mail=$_SESSION['email'];
$query0="SELECT * FROM join1 where team_ID='$teamid' AND email='$mail';";
$result = $mysqli->query($query0);
if ($result->num_rows!=0)
{
    echo'<script>
            alert("Already in team.");
            location.href = "https://people.eecs.ku.edu/~b884l228/team.php"
            
        </script>';
}
else{
    $q="SELECT * FROM team where team_ID='$teamid';";
    $re= $mysqli->query($q);
    if ($re->num_rows==0)
    {
        echo'<script>
                alert("Invalid team ID");
                location.href = "https://people.eecs.ku.edu/~b884l228/jointeam.html"
                
            </script>';
    }
    else{
$query1="INSERT INTO join1 (team_ID, email) VALUES ('$teamid', '$mail');";
if ($mysqli->query($query1)== TRUE)
{

echo'<script>
            location.href = "https://people.eecs.ku.edu/~b884l228/team.php"
        </script>';
}
}
}

$mysqli->close();
?>
