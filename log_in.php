<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
$username = $_POST["username"];
$password = $_POST["password"];
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = "SELECT username, password FROM users where username='$username' AND password='$password';";
$result = $mysqli->query($user);

if ($result->num_rows>=0)
{
    echo " ";
}
else
{
    echo "Error<br>";
}
    

$mysqli->close();
?>