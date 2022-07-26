<?php include "header.php";
include("config.php");

if($_SESSION["role"]==0)
{
header("location:$hostname/admin/post.php");
}
 
$ucat=$_GET['ucatid'];


if(isset($_POST['submit']))
{
    
    
    $category=mysqli_real_escape_string($con,$_POST['cat_name']);
   
    $sql1="UPDATE category SET category_name='{$category}' WHERE category_id='{$ucat}'";
   
    
    if(mysqli_query($con,$sql1))
    {
        header("location:$hostname/admin/category.php");
    }

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <?php
                   $sql="SELECT * FROM category WHERE category_id={$ucat}";
                   $result=mysqli_query($con,$sql);
                   while($row=mysqli_fetch_assoc($result))
                   {
                  ?>
                  <form action="<?php echo $_SERVER['PHP_SELF'];?>?ucatid=<?php echo $ucat; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                   }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
