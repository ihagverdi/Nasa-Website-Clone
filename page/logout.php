<?php
session_start();
session_destroy();
header("Location: nasa.php"); 
exit();
?>