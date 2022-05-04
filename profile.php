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
    $user = "SELECT DISTINCT team_ID FROM join1, users WHERE users.email = join1.email AND username='$username'";
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
    <h3> Team(s): 
        <?php while($row = $result -> fetch_assoc()){
        echo $row["team_ID"];
        echo "\r\n";}
        ?> 
    </h3> 
    <div style="text-align: left; margin-left: 1300; position:absolute">
    <br><text onclick="location.href='reset.html'" id="a"> Reset Password</text><br>
    
    
    <!-- echo "<br>";
    echo $email;
    echo "<br>";
    echo '$team_ID'; -->

   
    

   
    
    </body>
    </html>
   

    