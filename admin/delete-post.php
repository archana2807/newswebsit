<?php
include("config.php");
session_start();
if(!isset($_SESSION["username"]))
{
  header("location:$hostname/admin/");
}

if(isset($_GET["detid"]))
{
  $deletepostid=$_GET["detid"];  
  $deltcatepost=$_GET["catid"];

  $sql1="SELECT * FROM post WHERE post_id = {$deletepostid};"; 
  $result1=mysqli_query($con,$sql1);
  $row=mysqli_fetch_assoc($result1);
  unlink('upload/'.$row['post_img']);
  
  
  $sql="DELETE FROM post WHERE post_id = {$deletepostid};";
  $sql .= "UPDATE category SET post = post-1 WHERE category_id = {$deltcatepost}";
  
  if(mysqli_multi_query($con,$sql))
  {
   header("location:$hostname/admin/post.php");
      
  }
}
?>