<?php include "header.php";
include("config.php");

if($_SESSION["role"]== 0)
{
    header("location:$hostname/admin/post.php");
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
               <?php
               if(isset($_GET['page']))
               {
                   $page=$_GET['page'];

               }
               else
               {
                   $page=1;
               }
               $limit=2;
               $offset=($page-1)*$limit;
               //echo "$page";
               $serial=$offset+1;
               $sql="SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
               $result=mysqli_query($con,$sql);
               while($row=mysqli_fetch_assoc($result))
               {
               ?>
                        <tr>
                        
                            <td class='id'><?php echo $serial; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td class='edit'><a href='update-category.php?ucatid=<?php echo $row['category_id']; ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?dcatid=<?php echo $row['category_id']; ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                <?php
                $serial++;
               }
                ?>       
                    
                    </tbody>
                </table>
                <?php
                  
                  $sql1="SELECT * FROM category";
                  $result1=mysqli_query($con,$sql1);
                  $totalrecord=mysqli_num_rows($result1);
                  
                  $totalpage=ceil($totalrecord/$limit);
                 // echo "$totalpage";
                ?>
                <ul class='pagination admin-pagination'>
                    <?php
                    if($page>1)
                    {
                    ?>
                   <li class="active"><a href="category.php?page=<?php echo ($page-1); ?>">pre</a></li>
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
                    <li class="<?php echo $active; ?>"><a href="category.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    if($page<$totalpage)
                    {
                    ?>
                    <li class="active"><a href="category.php?page=<?php echo ($page+1); ?>">next</a></li>
                    <?php
                    }
                    ?>
                
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
