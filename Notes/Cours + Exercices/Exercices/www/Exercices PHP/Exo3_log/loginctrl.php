<?php
session_start();
$_SESSION["usrnom"] = $_POST["nm"];
header("location:loginsuite.php");
exit();
?>
