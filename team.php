<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
        if ($mysqli->connect_errno) {
            printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
        

?>

<html>

<body style="background-color:#f0f4f7;">
    <header >
        <style>
            #a:hover{
                color:blue;
            }
            #div1{
                border-radius: 15px; border-color: #c9cfd4; border-style: solid; text-align: center; border-width: 2;
                    background-color: white;width:300px; height:430px;
            }
            #text1{
                font-size: 20; font-weight: 500;
            }
            #div2{
                margin-bottom: 10;color: #706f6f;
            }
            #div3{
                text-align:left; margin-left: 30;margin-right: 15;
            }
        </style>
        
    </header>
    <div style="text-align: left; margin-left: 1300; position:absolute">
    <text onclick="location.href='profile.php'" id="a"> Profile</text>
        <text onclick="location.href='logout.php'" id="a"> Log out</text>
    </div>
    <br><br>
    <h1 style="text-align: center;">Select Your Team</h1><br>
    <div id="wrap">
    
        <?php
        $email = $_SESSION['email'];
        $query= "SELECT name, description FROM team, join1 WHERE  join1.team_ID=team.team_ID AND join1.email='$email'" ;
        $result = $mysqli->query($query);
        if ($result->num_rows>0)
        {
            while ($row = $result->fetch_assoc())
            {
                $tname=$row["name"];
                $query1="SELECT username from users, join1, team where join1.team_ID=team.team_ID and join1.email=users.email and name='$tname'";
                $result1 = $mysqli->query($query1);
                if ($result1->num_rows>0)
                {
                    echo "<div id='div1'> <br><text id='text1'>". $row["name"]."</text><br><br><br>
                        <div class='block'>
                        <div style='text-align:left; margin-left: 30;'>
                        <text>Member:</text>
                        </div>";
                        while ($row1 = $result1->fetch_assoc())
                    {
                        echo "<div style='margin-bottom: 10;color: #706f6f;'><br><text>".$row1["username"]. "</text></div>";
                        
                    }
                        echo "<br><div id='div3'> <text>Description:</text><br>
                        <text style='color: #706f6f;'>
                        &nbsp; &nbsp;&nbsp;&nbsp;". $row["description"]. "</text></div></div><br><button>Join</button></div>";
                     
                }
            
                
            }
        }

        ?>
        <div id="div4" style="border-radius: 15px; border-color: #c9cfd4; border-style: solid; text-align: center; border-width: 2;
                    background-color: white;width:300px; height:430px;">
            <br><text style="font-size: 20">
                Create a new team
            </text><br>
            <br><br><br><br><br><br>
            <a href="createNewTeam.html">
                <img src="icons8-add.gif" width="100" alt="addicon">
            </a>
        </div>
    </div>
</body>
<style>
    #wrap {
        display: flex;
        justify-content: space-around;
    }

    .block {
        height: 270px;
        width: 285px;
        overflow: hidden;
        overflow-y: auto;
    }
</style>
<html>