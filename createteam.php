<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
$teamname = $_POST["teamname"];
$description = $_POST["textarea"];
$user = "INSERT INTO team (name, description) VALUES ('$teamname', '$description');";
if ($mysqli->query($user)== TRUE)
{

$query ="SELECT team_ID from team where name='$teamname';";
$result = $mysqli->query($query);
$r=$result->fetch_assoc();
$teamid=$r["team_ID"];
$mail=$_SESSION['email'];
$query1="INSERT INTO join1 (team_ID, email) VALUES ('$teamid', '$mail');";
$mysqli->query($query1);

echo'<script>
            location.href = "https://people.eecs.ku.edu/~b884l228/team.php"
        </script>';
}
?>