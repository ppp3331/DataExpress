<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <?php
        echo "Welcome, ";
        print_r ($_SESSION['username']);
    ?>
<style>
        #grad
        {
            background-image: linear-gradient(blue, green);
        }
        </style>
</body>
</html>