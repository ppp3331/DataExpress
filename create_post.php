<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$posttitle = $_POST["posttitle"];
$postcontent = $_POST["postcontent"];
$creationtime = $POST["creationtime"];
$duedate = $POST["duedate"];
$post = "INSERT INTO post (content,title) VALUES ('$postcontent','$posttitle');";
if ($mysqli->query($post) == TRUE) {

    $query = "SELECT PostID from post where title='$posttitle';";
    $result = $mysqli->query($query);
    $r = $result->fetch_assoc();
    $PostId = $r["PostID"];
    $team_ID = $_SESSION['team_ID'];
    $query1 = "INSERT INTO Access (PostID, team_ID) VALUES ('$PostId', '$team_ID');";
    $mysqli->query($query1);

    echo '<script>
            location.href = "https://people.eecs.ku.edu/~b884l228/home.php"
        </script>';
}
