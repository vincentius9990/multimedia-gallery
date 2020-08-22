<html>
<head>
<title>Create Account</title>
</head>
<body>
<style>
form
{
    border:1px solid black;
    padding:4px 20px 20px 20px;
    width:25%;
    height:45%;
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
    $pass = $_POST['password'];
    $confirpass=$_POST['confirpass'];                                                                       
    $check="SELECT * FROM `signup` WHERE name='$name' ";
    $ok=mysqli_query($conn,$check);
    $exists=mysqli_num_rows($ok);
    if($exists > 0)
    {   
        echo'<div class="error">
 <h>username already exist</h> 
  </div>';
    }  
    else{
    if($pass == $confirpass)
   { $sql="INSERT into `ca`VALUES (null,'$name','$pass','$confirpass')";
      $result=mysqli_query($conn,$sql);
      error_reporting(0);}
if($result)
{echo "your account has been created";
    header("location:http://localhost/phpt/gallery.php");
}
    else {    
  echo'<div class="error">
 <h>passwords do not match</h> 
  </div>';
}

/*if($result)
{
echo "data inserted";
}
else {
    echo "data not inserted";
}*/
error_reporting(0);}}
?>
<form method="POST" action="">
<div class="div"><label for="name">Create your JFF Account</label></div>
<div class="hh"<h>if you already have an account then <h><a href="http://localhost/phpt/sign.php">sign in</a></div>
<input id="name" name="name" placeholder="Enter your name" type="text" required><br>
<label for="password"></label>
<input id="password" type="password" placeholder="Enter your password" required name="password"><br>
<label for="confirpass"></label>
<input name="confirpass" id="confirpass" placeholder="Enter for password confirmation" required type="password"><br>
<button type="submit" name="submit">Submit</button>
</form>
</body>
</html>
