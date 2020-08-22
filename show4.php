<html>
<head>
<title>categories</title>
</head>
<body>
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
$sql="select * from multimedia where descrip='epic fails'";
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