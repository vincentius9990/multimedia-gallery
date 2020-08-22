<?php
SESSION_START();
$_session=array();
session_destroy();
header("location:http://localhost/phpt/index.php");
?>