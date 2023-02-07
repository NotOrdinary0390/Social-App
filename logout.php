<!DOCTYPE html>
<html>
<title>Logout</title>
<body>

<?php
session_start();
session_destroy();
header("location: login.php");
?>



</body>
</html>