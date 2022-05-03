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
    <?php
    echo "Welcome, ";
    print_r($_SESSION['username']);
    ?>
    <header>
        <style>
            #a:hover {
                color: blue;
            }

            #div1 {
                border-radius: 15px;
                border-color: #c9cfd4;
                border-style: solid;
                text-align: center;
                border-width: 2;
                background-color: white;
                width: 300px;
                height: 430px;
            }

            #text1 {
                font-size: 20;
                font-weight: 500;
            }

            #div2 {
                text-align: left;
                margin-left: 30;
                margin-right: 15;
            }
        </style>

    </header>
    <div style="text-align: left; margin-left: 1300; position:absolute">
        <text onclick="location.href='profile.php'" id="a"> Profile</text><br>
        <text onclick="location.href='logout.php'" id="a"> Log out</text>
    </div>
    <br><br>
    <h1 style="text-align: center;">Check Your Posts</h1><br>
    <div id="wrap">
        <?php
        $query = "SELECT creationTime,completionTime,dueDate,content,title FROM post,Access,team WHERE  Access.PostID=post.PostID AND Access.team_ID=team.team_ID";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $title = $row["title"];
                echo "<div id='div1'> <br><text id='text1'>" . $row["title"] . "</text><br><br><br>
                        <div class='block'><br><div id='div2'> <text>Content:</text><br>
                        <text style='color: #706f6f;'>
                        &nbsp; &nbsp;&nbsp;&nbsp;" . $row["content"] . " </text><br><br>
                        <text>Create Time:</text><br>
                        <text style='color: #706f6f;'>
                        &nbsp; &nbsp;&nbsp;&nbsp;" . $row["creationTime"] . " </text><br><br>
                        <text>Due date:</text><br>
                        <text style='color: #706f6f;'>
                        &nbsp; &nbsp;&nbsp;&nbsp;" . $row["dueDate"] . " </text></div>
                        <br><div id='div2'> <text>Complete State:</text><br>
                        <text style='color: #706f6f;'>
                        &nbsp; &nbsp;&nbsp;&nbsp;" . $row["completionTime"] . " </text></div></div></div>";
            }
        }

        ?>
        <div id="div4" style="border-radius: 15px; border-color: #c9cfd4; border-style: solid; text-align: center; border-width: 2;
                    background-color: white;width:300px; height:430px;">
            <br><text style="font-size: 20">
                Create a new Post
            </text><br>
            <br><br><br><br><br><br>
            <a href="createNewPost.html">
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