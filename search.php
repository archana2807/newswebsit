<?php include 'header.php'; 
session_start();
include('config.php');
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                 <?php   
                 if(isset($_GET['search']))
                 {
                   $search_term=mysqli_real_escape_string($con,$_GET['search']);
                   
                 }
                 ?>
                  <h2 class="page-heading">Search : <?php  echo $search_term; ?></h2>
                  
<?php
 $limit=3;
if(isset($_GET["page"]))
{
    $page=$_GET["page"];
}
else
{
    $page=1;
}
$offset=($page-1)*$limit;


$sql="SELECT * FROM post 
LEFT JOIN category ON post.category=category.category_id
LEFT JOIN user ON post.author=user.user_id
WHERE post.title LIKE '%$search_term%' or post.description LIKE '%$search_term%' 
ORDER BY post_id DESC LIMIT {$offset},{$limit}";
$result=mysqli_query($con,$sql);


if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {

?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?sid=<?php echo $row["post_id"]; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?sid=<?php echo $row["post_id"]; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['user_id'] ?>'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'],0,200). '.....'; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?sid=<?php echo $row["post_id"]; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <?php
                            }
                        }
                            ?>
                    <?php        
                        
                    $sql1="SELECT * FROM post WHERE title LIKE '%$search_term%' or description LIKE '%$search_term%' ";
                    $result1=mysqli_query($con,$sql1);
                    $totalrecord=mysqli_num_rows($result1);
                    
                    
                    $totalpage=ceil($totalrecord/$limit);

                     
                  ?>
                  <ul class='pagination admin-pagination'>
                     
                     <?php
                     
                    if($page>1)
                    {
                     ?>
                       <li class="active"><a href="search.php?search=<?php echo $search_term; ?>&page=<?php echo ($page-1); ?>">pre</a></li>
                     

                    <?php
                    }
                      for($i=1;$i<=$totalpage;$i++)
                      {
                        
                        if($i==$page)
                        {
                            $active="active";
                        }
                        else
                        {
                            $active="";
                        }
                      ?>    
                     
                     <li class="<?php echo $active ?>"><a href="search.php?search=<?php echo $search_term; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                     

                     <?php
                      }
                     if($page<$totalpage)
                     {
                      ?>
                      <li class="active"><a href="search.php?search=<?php echo $search_term; ?>&page=<?php echo ($page+1); ?>">next</a></li>
                      <?php
                     }
                     ?>
                  </ul>
                        
                        
                      <!--  <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li> -->
                        </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
