<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<body>
<style>
     background-image: linear-gradient(blue, green);

    <?php
        echo "Welcome, ";
        print_r ($_SESSION['username']);
    ?>
</style>
</body>
</html>