<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }

    $username = $_SESSION['username'];
    $password = $_POST['password'];
    //$password = $_SESSION['password'];
    $user = "UPDATE users SET password = '$password' WHERE username='$username';";
    $result = $mysqli->query($user);

    if ($mysqli->query($user)== TRUE)
{
    echo'<script>
            alert("Password reset successfully");
            location.href = "https://people.eecs.ku.edu/~b884l228/"
            
        </script>';
    
}
else
{
    echo' <script>
            alert("Error");
            location.href = "https://people.eecs.ku.edu/~b884l228/reset.php"
            
     </script>';
}
    

$mysqli->close();
   
?>
