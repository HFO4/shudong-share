<?php
session_start();
unset($_SESSION[id]);
unset($_SESSION[usershell]);
echo '<script>window.location.href="login.php";</script>';
?>