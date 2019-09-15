<?php
session_start();
unset($_SESSION['librarian']);
header("Location: login.php");




?>