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

</body>
</html>