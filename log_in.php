<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
$username = $_POST["username"];
$password = $_POST["password"];
$email= $_POST["email"];
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = "SELECT username, password FROM users where username='$username' AND password='$password';";
$result = $mysqli->query($user);

if ($result->num_rows>0)
{
    $_SESSION['username']= $username;
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    echo'<script>
            location.href = "https://people.eecs.ku.edu/~b884l228/home.php"
        </script>';
}
else
{
    echo'<script>
            confirm("Invalid username or password");
            location.href = "https://people.eecs.ku.edu/~b884l228/"
        </script>';
}
    

$mysqli->close();
?>