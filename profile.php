<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
?>
    
<!DOCTYPE html>
    <html>

    <head>
    <style>
    .profile{
        margin: auto;
        text-align: center;
        max-width: 900px;
        height: 500px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        
    }  
    </style>
    </head>
    <body style="background-color:#f0f4f7;">
<?php
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $team_ID = $_SESSION['team_ID'];
    $user = "SELECT username, email, team_ID FROM users, join1 WHERE username='$username' AND users.email='$email' AND join1.team_ID='$team_ID' AND users.email = join1.email;";
    $result = $mysqli->query($user);
    
    //echo '<script>
//     location.href = "https://people.eecs.ku.edu/~b884l228/profile.html"
//     </script>';
    ?>

<div class="profile">
    <h1>PROFILE:</h1>
    <img src="1907072.png" style="width: 300px; height:300px;">
    <h3> User: <?php echo $username;?></h3>
    <h3> Email: <?php echo $email;?> </h3>
    <div style="text-align: left; margin-left: 1300; position:absolute">
    <br><text onclick="location.href='reset.html'" id="a"> Reset Password</text><br>
    <!-- <h3> Team: 
        <?php //while($row = $result -> fetch_assoc()){
        //echo $row["team_ID"];}?> 
    </h3>  -->
    
    <!-- echo "<br>";
    echo $email;
    echo "<br>";
    echo '$team_ID'; -->

   
    

   
    
    </body>
    </html>
   

    