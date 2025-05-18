<?php
session_start();
session_unset();    
session_destroy();  
header("Location: login_manager.php"); 
exit();
?>
