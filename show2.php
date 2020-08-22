<html>
<head>
<title>categories</title>
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
}</style>
<div class="row">
<h>GALLERY</h><br>
<?php
    include 'C:\xampp\htdocs\phpt\galleryconn.php';
$sql="select * from multimedia where descrip='classics'";
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
}
?>
</body>
</html>