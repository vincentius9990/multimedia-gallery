<html>
<head>
<title>sign in</title>
</head>
<body> 
<style>
form
{
    border:1px solid black;
    padding:4px 20px 20px 20px;
    width:25%;
    height:40%;
    margin:10% auto;
    background-color:#FA8072;

}
input,button
{
    width:100%;
    height:40px;
    margin:1px;
    display:block;
    outline:none;
}
input:focus {
  border: 3px solid #555;
}
body
{
    background-color:#E6E6E6;
}
.div
{
    text-align:center;
    font-size:30px;
    padding:2px;
}
.hh{
text-align:center;
margin-bottom:20px;
}
.error
{
    border:1px outset red;
    background-color:#ff4d4d;
    height:40px;
    margin-top:0px;
}
.error h
{
color:black;
}

</style>
<?php
include 'C:\xampp\htdocs\phpt\connect.php';
if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
//$sql="INSERT into `signup`VALUES (null,'$name','$pass')";
$sql="INSERT into `signup`VALUES (null,?,?)";
$check="SELECT * FROM `ca` WHERE name='$name' AND pass='$pass' ";
    $ok=mysqli_query($conn,$check);
    $exists=mysqli_num_rows($ok);
    if($exists > 0){
//$result=mysqli_query($conn,$sql);
$result=mysqli_prepare($conn,$sql);
if($result)
{
mysqli_stmt_bind_param($result,'ss',$name,$pass);
mysqli_stmt_execute($result);
    header("location:http://localhost/phpt/gallery.php");
}
error_reporting(0);}
else {
    echo'<div class="error">
 <h>account does not exist</h>
 <a href="http://localhost/phpt/ca.php">click here to create account</a> 
  </div>';
}}
?>
<form method="POST" ACTION="">
<div class="div"><label for="name">Create your JFF Account</label></div>
<div class="hh"<h>if you have not created an account then <h><a href="http://localhost/phpt/ca.php">click here</a></div>
<input name="name" placeholder="Enter your name" type="text" required><br>
<label for="password"></label>
<input id="pass" type="password" placeholder="Enter your password" required name="pass"><br>
<label for="confirpass"></label>
<button type="submit" name="submit">Submit</button>
</form>
</body>
</html>