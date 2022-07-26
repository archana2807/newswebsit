<?php
include('config.php');
session_start();

//echo $_SESSION['role'];

if(!isset($_SESSION['username'] ))
{
  header("location:$hostname/admin");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                 <?php 
                 include('config.php');
                  $sql="SELECT * FROM setting";
                  $result=mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($row['website_logo']=="")
                        {
                        ?>
                            <div class="col-md-2">
                            <a href="post.php" id="logo"><?php echo $row['website_name']; ?></a>
                            </div>
                        <?php
                         }
                         else
                         {
                          ?>   
                            <div class="col-md-2">
                            <a href="post.php" id="logo"><img class="logo" src="images/<?php echo $row['website_logo']; ?>"></a>
                            </div>
                         <?php   
                         }
                    }
                  }
                  ?>

                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        <a href="logout.php" class="admin-logout" > <?php echo "hello ", $_SESSION['username'];?> logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php 
                           include("config.php");

                          
                           if($_SESSION["role"] == '1')
                           {
                            ?>
                           <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="setting.php">Setting</a>
                            </li>

                           <?php
                           }
                           
                    
                           

                           ?>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
