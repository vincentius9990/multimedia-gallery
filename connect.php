<?php
$dbservername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="form";
$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
global $conn;
/*if(!$conn)
{
    echo "error".mysqli_connect_error;
}
else {
    echo "successfull";
}
?>*/