<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<body>
<style>
     body
        {
            background: linear-gradient(red, blue, purple, pink);
        }
</style>
    <?php
        echo "Welcome, ";
        print_r ($_SESSION['username']);
    ?>

</body>
</html>