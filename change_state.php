<?php
session_start();
$mysqli = new mysqli("mysql.eecs.ku.edu", "b884l228", "einahH7a", "b884l228");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
if (isset($_GET['pid'])) {
    $_SESSION['postid'] = $_GET['pid'];
}

$state = $_POST['newstate'];
$postID = $_SESSION["postid"];
$query0 = "UPDATE post SET completionTime = '$state' WHERE PostID = '$postID'";
if ($mysqli->query($query0) == TRUE) {
    echo '<script>
                alert("State update successfully!");
            location.href = "https://people.eecs.ku.edu/~b884l228/home.php"
        </script>';
} else {
    echo ' <script>
            alert("Error");
     </script>';
}
?>
<html>
<h1">Post ID: <?php echo $_SESSION["postid"] ?></h1><br>

</html>