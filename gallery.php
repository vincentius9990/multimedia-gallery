<html>
<head>
<title>gallery</title>
<link href="index.css" rel="stylesheet">
</head>
<body>
<div class="categories">
<ul>
<li>
<div class="dropdown">
  <span><b>categories</b></span>
  <div class="dropdown-content">
  <a href="http://localhost/phpt/show1.php">dank</a><br><div>
  <a href="http://localhost/phpt/show2.php">classics</a><br><div>
  <a href="http://localhost/phpt/show3.php">savage</a><br><div>
  <a href="http://localhost/phpt/show4.php">epic fails</a><br><div>
  </div>
</div></li>
<li><a href="http://localhost/phpt/sign.php">sign up</a></li>
<li><a href="http://localhost/phpt/ca.php">create account</a></li>
<li><a href="http://localhost/phpt/logout.php">log out</a></li>
</ul>
<div class="home"><a href="http://localhost/phpt/gallery.php">CHUCKLESSOME.COM</a></div>
</div>
<style>
.column
{
    margin:5px;
    display:inline-block;
      }
    
    .column embed{
  opacity: 0.9;
  cursor: pointer;
}

.column embed:hover{
  opacity: 1;
}
.row h
{
color:red;
font-size:30px;
}
form
{
    border:1px solid black;
    padding:4px 20px 20px 20px;
    width:25%;
    height:50%;
    margin:10% auto;
    background-color:#FA8072;

}
input,button,select
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
.div
{
    text-align:center;
    font-size:30px;
    padding:2px;
}
.t
{
  text-align:center;
  border:1px outset grey;
}
</style>
<div class="row">
<h>GALLERY</h><br>
<?php
include 'C:\xampp\htdocs\phpt\galleryconn.php';
$sql="select * from multimedia";
$result=mysqli_prepare($conn,$sql);
if(!$result)
{
  echo "mysql connection failed";
}
else {
  mysqli_stmt_bind_result($result,$id,$title,$desc,$imagefullname);
  mysqli_stmt_execute($result);
  while(mysqli_stmt_fetch($result))
{
echo '<div class="column" > <embed src="uploads/'.$imagefullname.'" width="400" height="380">
<div class="t"><br><b>'.$title.'</b><br>
<p>'.$desc.'</p></div></div>';} 
?>
</div> 
</body>
</html>
<?php 
error_reporting(0);
session_start();
$_session['username']="username";
if(isset($_session['username']))
{
  echo '<div class="upload">
<form action="" method="POST" enctype="multipart/form-data">
<div class="div"><label for="name">UPLOAD</label></div>
<input placeholder="title" type="text" name="title" required><br>
<select type="text" name="desc">
<option value="dank">dank</option>
<option value="classics">classics</option>
<option value="savage">savage</option>
<option value="epic fails">epic fails</option>
</select><br>
<input type="file" name="uploadfile"><br>
<button type="submit" name="submit">upload</button><br></form>
</div>';}
include "C:\xampp\htdocs\phpt\galleryconn.php";
if(isset($_POST['submit']))
{
  //$filename=$_POST['filename'];
  /*if(empty($_POST['filename']))
  {$filename="gallery";}
  else
  {
    $filename=strtolower(str_replace('','-',$filename));
  }*/
$file=$_FILES["uploadfile"]['name'];
$temp=$_FILES["uploadfile"]['tmp_name'];
$type=$_FILES["uploadfile"]['type'];
$size=$_FILES["uploadfile"]['size'];
$grabextension=explode(".","$file");
$actualextension=strtolower(end($grabextension));
$allowed=array("mp4","png","jpg","jpeg","mov","webm","gif","webp");
if(in_array($actualextension,$allowed));
{
  if($size<10000000)
  {
  
$sql="INSERT into `multimedia`VALUES (null,?,?,?)";
//$result=mysqli_query($conn,$sql);
$result=mysqli_prepare($conn,$sql);
if($result)
  {mysqli_stmt_bind_param($result,'sss',$title,$desc,$imagefullname);
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $imagefullname=$file. ".".uniqid("",true).".".$actualextension;

  $filedestination="uploads/".$imagefullname;
mysqli_stmt_execute($result);
move_uploaded_file("$temp","$filedestination");
  }
  else
  {
    echo "file size too big!";
  }
  }
  
  }
  } }?>