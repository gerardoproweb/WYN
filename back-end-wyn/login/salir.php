<?php
session_start();
unset($_SESSION["login"]);
//header('Window-target: _parent');
//header('Location: index.php');
header("Location: ../index.php");
?>
