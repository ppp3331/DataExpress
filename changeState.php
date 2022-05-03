<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if (isset($_GET['pid'])) {
    $_SESSION['postid'] = $_GET['pid'];
} ?>
<html>

<head>
    <style>
        text {
            font-size: 20;
            margin-right: 320;
        }

        input[type=text] {
            width: 40%;
            padding: 10px 15px;
            margin: 8px 0;

        }

        input[type=password] {
            width: 40%;
            padding: 10px 15px;
            margin: 8px 0;

        }

        #pineapple {
            background-image: url(1907072.png);
            width: 120;
            height: 120;
            background-size: contain;
            margin-top: -470;
            margin-left: 850;

        }

        #a:hover {
            color: blue;

        }
    </style>
</head>

<body style="background-color:#f0f4f7;">
    <div style="border-radius: 30px; border-color: #c9cfd4; border-style: solid; text-align: center; border-width: 2;
                    background-color: white; margin:150">
        <br><br>
        <h1>Change State</h1>
        <h1">Post ID:
            <?php echo $_SESSION["postid"] ?>
            <br></h1><br>
            <form action="change_state.php" method="post">
                <text>New Complete State:</text><br>
                <input required type="text" name="newstate"><br><br>
                <input type="submit" value="Submit">
            </form>

    </div>
    <div id="pineapple"></div>
</body>

</html>