<?php
include 'C:\xampp\htdocs\phpt\connect.php';
<?php require_once 'sign.php' ?>

$name = '';

if (isset($_POST['name']))
{
    $name = $_POST['name'];
}
$pass = '';

if (isset($_POST['pass']))
{
    $pass = $_POST['pass'];
}
$sql="INSERT into `signup` (`ID`, `name`, `password`) VALUES (2,'vincent','kumar');";
mysqli_query($conn,$sql);
error_reporting(0);
header('location:file:///C:/JUST%20FOR%20FUN/sign.html');
?>