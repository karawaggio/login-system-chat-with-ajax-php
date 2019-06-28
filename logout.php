<?php 
    include("includes/header.php");
    session_destroy();
    setcookie('username', false);
    header("location: index.php");
?>
</body>
</html>