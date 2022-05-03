<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$creationtime = $_POST["creationtime"];
$completionTime = $_POST["completionTime"];
$duedate = $_POST["duedate"];
$content = $_POST["postcontent"];
$title = $_POST["posttitle"];
$post = "INSERT INTO post (creationTime, completionTime, dueDate,content,title) VALUES ('$creationtime', '$completionTime', '$duedate', '$content', '$title');";
if ($mysqli->query($post) == TRUE) {

    $query = "SELECT PostID from post where title='$title';";
    $result = $mysqli->query($query);
    $r = $result->fetch_assoc();
    $PostId = $r["PostID"];
    if (isset($_GET['tid'])) {
        $_SESSION['teamid'] = $_GET['tid'];
    }
    $team_ID = $_SESSION["teamid"];
    $query1 = "INSERT INTO Access (PostID, team_ID) VALUES ('$PostId', '$team_ID');";
    $mysqli->query($query1);

    echo '<script>
            location.href = "https://people.eecs.ku.edu/~b884l228/home.php"
        </script>';
}
