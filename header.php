<?php
include("config.php");
$pag=basename($_SERVER['PHP_SELF']);
switch($pag){
    case "single.php":
        if(isset($_GET['sid']))
        {
            $sql_title="SELECT * FROM post WHERE post_id= {$_GET['sid']}";
            $result_title=mysqli_query($con,$sql_title);
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title=$row_title['title'] .'news';

        }
        else
        {
            $page_title="no post find";
        }
    break;    
    case "author.php":
        if(isset($_GET['aid']))
        {
            $sql_title="SELECT * FROM post
            LEFT JOIN user ON post.author=user.user_id
             WHERE post.author= {$_GET['aid']}";
            $result_title=mysqli_query($con,$sql_title);
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title=$row_title['username'];

        }
        else
        {
            $page_title="no post find";
        }
    break;    
    case  "category.php":
        if(isset($_GET['cid']))
        {
            $sql_title="SELECT * FROM post
            LEFT JOIN category ON post.category=category.category_id
             WHERE category= {$_GET['cid']}";
            $result_title=mysqli_query($con,$sql_title);
            $row_title=mysqli_fetch_assoc($result_title);
            $page_title=$row_title['category_name'];

        }
        else
        {
            $page_title="no post find";
        }
    break;    
    case "search.php":
        if(isset($_GET['search']))
        {
           
            $page_title=$_GET['search'];

        }
        else
        {
            $page_title="no post find";
        }
    break;    
    default:
            $page_title="archana patel news project ";
    break;              

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $page_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <?php 
                 include('config.php');
                  $sql1="SELECT * FROM setting";
                  $result1=mysqli_query($con,$sql1);
                  if(mysqli_num_rows($result1)>0)
                  {
                    while($row1=mysqli_fetch_assoc($result1))
                    {
                        if($row1['website_logo']=="")
                        {
                        ?>
                            <div class="col-md-2">
                            <a href="post.php" id="logo"><?php echo $row1['website_name']; ?></a>
                            </div>
                        <?php
                         }
                         else
                         {
                          ?>   
                            <div class="col-md-offset-4 col-md-4">
                            <a href="post.php" id="logo" ><img  style="height: 80px;width: 80px;" src="images/<?php echo $row1['website_logo']; ?>"></a>
                            </div>
                         <?php   
                         }
                    }
                  }
                  ?>
            
            
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include("config.php");
                $active="";
                if(isset($_GET['cid']))
                {
                    $cat_id=$_GET["cid"];
                }
                $sql="SELECT * FROM category WHERE post>0";
                $result=mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
            
                ?>
                
                <ul class='menu'>
                <li><a href='index.php'>Home</a></li>
                    <?php

                    while($row=mysqli_fetch_assoc($result))
                    {
                        if(isset($_GET['cid']))
                        {
                           // $cat_id=$_GET["cid"];
                        if($cat_id==$row['category_id'])
                        {
                          $active="active";
                        }
                        else
                        {
                          $active="";
                        }
                        }
                    ?>
                    <li><a class="<?php echo $active ; ?>" href='category.php?cid=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
                 <?php 
                     
                }
                 ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
