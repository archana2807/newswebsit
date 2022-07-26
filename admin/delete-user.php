<?php

include("config.php");
session_start();
if($_SESSION["role"]==0)
{
header("location:$hostname/admin/post.php");
}


$deleteid=$_GET["did"];
$sql="DELETE FROM user WHERE user_id=$deleteid";
if(mysqli_query($con,$sql))
{
    header("location:$hostname/admin/users.php");
}
else
{
 echo "cant detete record";
}
mysqli_close($con);

?>