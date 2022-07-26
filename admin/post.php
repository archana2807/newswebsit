<?php include "header.php"; 
include("config.php");

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

if($_SESSION['role']==1)
{
$sql="SELECT * FROM post 
LEFT JOIN category ON post.category=category.category_id
LEFT JOIN user ON post.author=user.user_id
ORDER BY post_id DESC LIMIT {$offset},{$limit}";
$result=mysqli_query($con,$sql);
}
else
{
    $sql="SELECT * FROM post 
    LEFT JOIN category ON post.category=category.category_id
    LEFT JOIN user ON post.author=user.user_id
    WHERE post.author={$_SESSION["userid"]}
    ORDER BY post_id DESC LIMIT {$offset},{$limit}";
    $result=mysqli_query($con,$sql);
}


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                          $serial=$offset+1;
                          while($row=mysqli_fetch_assoc($result))
                          {

                          ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row["title"]; ?></td>
                              <td><?php echo $row["category_name"] ?></td>
                              <td><?php echo $row["post_date"]; ?></td>
                              <td><?php echo $row["first_name"]; ?></td>
                              <?php $a=$row["category"] ;?>
                              <td class='edit'><a href='update-post.php?uid=<?php echo $row["post_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?detid=<?php echo $row["post_id"]; ?>&catid=<?php echo $a; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php
                          $serial++;
                          }
                          ?>
                         
                      </tbody>
                  </table>
                  <?php
                  if($_SESSION['role']==1)
                  {
                  $sql1="SELECT * FROM post";
                  $result1=mysqli_query($con,$sql1);
                  $totalrecord=mysqli_num_rows($result1);
                  
                  $totalpage=ceil($totalrecord/$limit);
                  }
                  else
                  {
                    $sql1="SELECT * FROM post WHERE author={$_SESSION["userid"]}";
                    $result1=mysqli_query($con,$sql1);
                    $totalrecord=mysqli_num_rows($result1);
                    
                    $totalpage=ceil($totalrecord/$limit);
                  }
                  ?>
                  <ul class='pagination admin-pagination'>
                     
                     <?php
                     
                    if($page>1)
                    {
                     ?>
                       <li class="active"><a href="post.php?page=<?php echo ($page-1); ?>">pre</a></li>
                     

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
                     
                     <li class="<?php echo $active ?>"><a href="post.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                     

                     <?php
                      }
                     if($page<$totalpage)
                     {
                      ?>
                      <li class="active"><a href="post.php?page=<?php echo ($page+1); ?>">next</a></li>
                      <?php
                     }
                     ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <?php

  ?>
<?php include "footer.php"; ?>
