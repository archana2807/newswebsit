<?php 
 include "header.php";
include("config.php");

if(isset($_POST['submit']))
{   
    if(empty($_FILES['new_image']['name']))
    {
      $logo_name=$_POST['old_image'];
    }
    else
    {
    $logo_name=$_FILES['new_image']['name'];
    $logo_size=$_FILES['new_image']['size'];
    $logo_tmp=$_FILES['new_image']['tmp_name'];
    $logo_type=$_FILES['new_image']['type'];
    $logo_ext=strtolower(end(explode('.',$logo_name)));
    $extension=array('jpg','jpeg','png');
    if(in_array($logo_ext,$extension)==false)
    {
      $error[]="extension is wrong";
    }
    if($logo_size>2097152)
    {
        $error[]="size should be less than 2gb";
    }
    if(empty($error)==true)
    {
        move_uploaded_file($logo_tmp,'images/'. $logo_name);
    }
    else
    {
        print_r($error);
    }
    }
    $web_name=mysqli_real_escape_string($con,$_POST['webname']);
    $footer_desc=mysqli_real_escape_string($con,$_POST['webdesc']);

    $sql1="UPDATE setting SET website_name='{$web_name}',
    footer_desc='{$footer_desc}',website_logo='{$logo_name}'";
    if(mysqli_query($con,$sql1))
    {
        echo "data updated";
    }
    

}

?>



 
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website Setting </h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <?php 
                  $sql="SELECT * FROM setting";
                  $result=mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                    {
                  ?>      
                    

                 
                  <form  action="<?php $_SERVER["PHP_SELF"];?> " method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Website Name</label>
                          <input type="text" value="<?php echo $row['website_name'];?>" name="webname" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Footer Description</label>
                          
                          <textarea class="form-control"  required rows="5" name="webdesc">
                          <?php echo $row["footer_desc"]; ?>
                          </textarea>
                      </div>
                      
                      <div class="form-group">
                          <label for="exampleInputPassword1">Logo Image</label>
                          <input type="file"   name="new_image">
                          <img src="images/<?php echo $row['website_logo'];?>">
                          <input type="hidden" name="old_image" value="<?php echo $row["website_logo"];?>">
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>

                  <?php
                    }
                }
                  ?>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
