<?php
include("config.php");
session_start();
if($_SESSION["role"]==0)
{
header("location:$hostname/admin/post.php");
}
 

if(!isset($_SESSION["username"]))
{
  header("location:$hostname/admin/");
}

if(isset($_GET["dcatid"]))
{
  $deletecatid=$_GET["dcatid"];  
  

  
  $sql="DELETE FROM category WHERE category_id = {$deletecatid};";
  
  
  if(mysqli_query($con,$sql))
  {
   header("location:$hostname/admin/category.php");
      
  }
}
?>