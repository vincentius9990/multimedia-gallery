<?php
include "C:\xampp\htdocs\phpt\galleryconn.php";
if(isset($POST_['submit']))
{
  //$filename=$_POST['filename'];
  /*if(empty($_POST['filename']))
  {$filename="gallery";}
  else
  {
    $filename=strtolower(str_replace('','-',$filename));
  }*/
  $folder="uploads/";
$file=$_FILES["uploadfile"]['name'];
$tempname=$_FILES["uploadfile"]['tmp_name'];
$type=$_FILES["uploadfile"]['type'];
$size=$_FILES["uploadfile"]['size'];
$fileerror=$_FILES['uploadfile']['error'];
$grabextension=explode(".","$file");
$actualextension=strtolower(end($grabextension));
$allowed=array("mp4","png","jpg","jpeg","mov","wmv","gif");
if(in_array($actualextension,$allowed));
{
if($fileerror===0)
{
  if($size<1000000)
  {

$sql="INSERT into `multimedia`VALUES (null,?,?,?)";
//$result=mysqli_query($conn,$sql);
$result=mysqli_prepare($conn,$sql);
if($result)
  mysqli_stmt_bind_param($result,'sss',$title,$desc,$imagefullname);
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $imagefullname=$file. ".".uniqid("",true).".".$actualextension;
  $filedestination=$folder.$imagefullname;
mysqli_stmt_execute($result);
move_uploaded_file("$tempname","$filedestination");
  }
  else{
    echo "file size too big!";
  }
}