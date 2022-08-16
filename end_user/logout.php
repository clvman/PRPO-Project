<?php
session_start();
unset($_SESSION['NCE_TT_end_user']);


header("Location: login.php");

?>