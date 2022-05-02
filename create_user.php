<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$user = "INSERT INTO users (username, password, email) VALUES (\"$username\", \"$password\", \"$email\");";
if ($mysqli->query($user)== TRUE)
{
    echo'<script>
            alert("Account created successfully");
            location.href = "https://people.eecs.ku.edu/~b884l228/"
            
        </script>';
    
}
else
{
    echo' <script>
            alert("Error");
            location.href = "https://people.eecs.ku.edu/~b884l228/create_user.php"
            
     </script>';
}
    

$mysqli->close();
?>